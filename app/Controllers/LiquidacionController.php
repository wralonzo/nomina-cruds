<?php

namespace App\Controllers;

use App\Models\LiquidacionModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class LiquidacionController extends ResourceController
{
    public function display()
    {
        $model = new LiquidacionModel();
        $data = $model->getAll();
        return view('layout/header') . view('liquidacion/display', [
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
                return view('layout/header') . view('liquidacion/register', ['empleados' =>  $empleados]) . view('layout/footer');
            }
            $model = new LiquidacionModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/liquidacion/display');
        } catch (Exception $e) {
            return redirect()->to('/liquidacion/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new LiquidacionModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/liquidacion/display');
                }
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('liquidacion/update', ['data' => $record, 'empleados' =>  $empleados]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/liquidacion/display');
        } catch (Exception $e) {
            return redirect()->to('/liquidacion/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new LiquidacionModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/liquidacion/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/liquidacion/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/liquidacion/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/liquidacion/display');
        }
    }
}
