<?php

namespace App\Controllers;

use App\Models\PermisosModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class PermisoController extends ResourceController
{
    public function display()
    {
        $model = new PermisosModel();
        $data = $model->getPermisosWithEmpleados();
        return view('layout/header') . view('permiso/display', [
            'data' => $data
        ]) . view('layout/footer');
    }


    public function register()
    {
        try {
            $session = session();
            if (!$this->request->getVar()) {
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('permiso/register', ['empleados' =>  $empleados]) . view('layout/footer');
            }
            $model = new PermisosModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/permiso/display');
        } catch (Exception $e) {
            return redirect()->to('/permiso/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new PermisosModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/permiso/display');
                }
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('permiso/update', ['data' => $record, 'empleados' =>  $empleados]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/permiso/display');
        } catch (Exception $e) {
            return redirect()->to('/permiso/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new PermisosModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/permiso/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/permiso/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/permiso/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/permiso/display');
        }
    }
}
