<?php

namespace App\Controllers;

use App\Models\HorasExtrasModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class HorasExtrasController extends ResourceController
{
    public function display()
    {
        $model = new HorasExtrasModel();
        $data = $model->getAll();
        return view('layout/header') . view('horaextra/display', [
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
                return view('layout/header') . view('horaextra/register', ['empleados' =>  $empleados]) . view('layout/footer');
            }
            $model = new HorasExtrasModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/horaextra/display');
        } catch (Exception $e) {
            return redirect()->to('/horaextra/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new HorasExtrasModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/horaextra/display');
                }
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('horaextra/update', ['data' => $record, 'empleados' =>  $empleados]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/horaextra/display');
        } catch (Exception $e) {
            return redirect()->to('/horaextra/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new HorasExtrasModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/horaextra/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/horaextra/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/horaextra/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/horaextra/display');
        }
    }
}
