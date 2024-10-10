<?php

namespace App\Controllers;

use App\Models\NominaModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class NominaController extends ResourceController
{
    public function display()
    {
        $model = new NominaModel();
        $data = $model->getAll();
        return view('layout/header') . view('nomina/display', [
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
                return view('layout/header') . view('nomina/register', ['empleados' =>  $empleados]) . view('layout/footer');
            }
            $model = new NominaModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/nomina/display');
        } catch (Exception $e) {
            return redirect()->to('/nomina/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new NominaModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/nomina/display');
                }
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('nomina/update', ['data' => $record, 'empleados' =>  $empleados]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/nomina/display');
        } catch (Exception $e) {
            return redirect()->to('/nomina/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new NominaModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/nomina/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/nomina/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/nomina/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/nomina/display');
        }
    }
}
