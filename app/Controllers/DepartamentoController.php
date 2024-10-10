<?php

namespace App\Controllers;

use App\Models\DepartamentoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class DepartamentoController extends ResourceController
{
    public function display()
    {
        $model = new DepartamentoModel();
        $data = $model->findAll();
        return view('layout/header') . view('departamento/display', [
            'data' => $data
        ]) . view('layout/footer');
    }


    public function register()
    {
        try {
            $session = session();
            if (!$this->request->getVar()) {
                return view('layout/header') . view('departamento/register') . view('layout/footer');
            }
            $model = new DepartamentoModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/departamento/display');
        } catch (Exception $e) {
            return redirect()->to('/departamento/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new DepartamentoModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/departamento/display');
                }
                return view('layout/header') . view('departamento/update', ['data' => $record]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/departamento/display');
        } catch (Exception $e) {
            return redirect()->to('/departamento/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new DepartamentoModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/departamento/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/departamento/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/departamento/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/departamento/display');
        }
    }
}
