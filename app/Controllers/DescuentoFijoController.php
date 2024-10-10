<?php

namespace App\Controllers;

use App\Models\DescuentosFijosModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class DescuentoFijoController extends ResourceController
{
    public function display()
    {
        $model = new DescuentosFijosModel();
        $data = $model->findAll();
        return view('layout/header') . view('descuentofijo/display', [
            'data' => $data
        ]) . view('layout/footer');
    }


    public function register()
    {
        try {
            $session = session();
            if (!$this->request->getVar()) {
                return view('layout/header') . view('descuentofijo/register') . view('layout/footer');
            }
            $model = new DescuentosFijosModel();
            $model->save($this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/descuentofijo/display');
        } catch (Exception $e) {
            return redirect()->to('/descuentofijo/display');
        }
    }
    public function upgrade($id)
    {
        try {
            $model = new DescuentosFijosModel();
            $session = session();
            if (!$this->request->getVar()) {
                $record = $model->find($id);
                if (!$record) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/descuentofijo/display');
                }
                return view('layout/header') . view('descuentofijo/update', ['data' => $record]) . view('layout/footer');
            }

            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/descuentofijo/display');
        } catch (Exception $e) {
            return redirect()->to('/descuentofijo/display');
        }
    }
    public function remove($id)
    {
        $session = session();
        try {
            $model = new DescuentosFijosModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/descuentofijo/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/descuentofijo/display');
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/descuentofijo/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/descuentofijo/display');
        }
    }
}
