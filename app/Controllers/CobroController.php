<?php

namespace App\Controllers;

use App\Models\DescuentosPagosModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class CobroController extends ResourceController
{
    public function display()
    {
        $model = new DescuentosPagosModel();
        $data = $model->getAll();
        return view('layout/header') . view('cobro/display', [
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
                return view('layout/header') . view('cobro/register', ['empleados' =>  $empleados]) . view('layout/footer');
            }
            $model = new DescuentosPagosModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/cobro/display');
        } catch (Exception $e) {
            return redirect()->to('/cobro/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new DescuentosPagosModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/cobro/display');
                }
                $empleadoModel = new EmpleadoModel();
                $empleados = $empleadoModel->findAll();
                return view('layout/header') . view('cobro/update', ['data' => $record, 'empleados' =>  $empleados]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/cobro/display');
        } catch (Exception $e) {
            return redirect()->to('/cobro/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new DescuentosPagosModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/cobro/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/cobro/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/cobro/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/cobro/display');
        }
    }
}
