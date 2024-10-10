<?php

namespace App\Controllers;

use App\Models\PrestamoModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class PrestamoController extends ResourceController
{
    public function display()
    {
        $model = new PrestamoModel();
        $data = $model->getAll();
        return view('layout/header') . view('prestamo/display', [
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
                return view('layout/header') . view('prestamo/register', ['empleados' =>  $empleados]) . view('layout/footer');
            }
            $model = new PrestamoModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/prestamo/display');
        } catch (Exception $e) {
            return redirect()->to('/prestamo/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new PrestamoModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/prestamo/display');
                }
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('prestamo/update', ['data' => $record, 'empleados' =>  $empleados]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/prestamo/display');
        } catch (Exception $e) {
            return redirect()->to('/prestamo/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new PrestamoModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/prestamo/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/prestamo/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/prestamo/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/prestamo/display');
        }
    }
}
