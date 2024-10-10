<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DepartamentoModel;
use App\Models\EmpleadoModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class EmpleadoController extends ResourceController
{
    public function register()
    {
        try {
            $session = session();
            if (!$this->request->getVar()) {
                $modeldeptos = new DepartamentoModel();
                $deptos = $modeldeptos->findAll();
                return view('layout/header') . view('empleado/register', ['deptos' => $deptos]) . view('layout/footer');
            }
            $userModel = new EmpleadoModel();
            $userModel->save($this->request->getVar());
            $session->setFlashdata('msg', 'El empleado ha sido creado');
            return redirect()->to('/empleado/display');
        } catch (Exception $e) {
            return redirect()->to('/empleado/display');
        }
    }

    public function display()
    {
        $userModel = new EmpleadoModel();
        $users = $userModel->findAll();
        return view('layout/header') . view('empleado/display', [
            'data' => $users
        ]) . view('layout/footer');
    }

    public function upgrade($id)
    {
        try {
            $model = new EmpleadoModel();
            $session = session();
            if (!$this->request->getVar()) {
                $user = $model->find($id);
                if (!$user) {
                    $session->setFlashdata('msg', 'El empleado no existe');
                    return redirect()->to('/empleado/display');
                }
                $modeldeptos = new DepartamentoModel();
                $deptos = $modeldeptos->findAll();
                return view('layout/header') . view('empleado/update', ['data' => $user, 'deptos' => $deptos]) . view('layout/footer');
            }
            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El empleado ha sido actualizado');
            return redirect()->to('/empleado/display');
        } catch (Exception $e) {
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }

    public function remove($id)
    {
        $session = session();
        try {
            $model = new EmpleadoModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El empleado ya fue eliminado o no existe');
                return redirect()->to('/empleado/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El empleado no fue eliminado');
                return redirect()->to('/empleado/display');
            }
            $session->setFlashdata('msg', 'El empleado fue eliminado');
            return redirect()->to('/empleado/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El empleado no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/empleado/display');
        }
    }


    public function findone($id)
    {
        $userModel = new EmpleadoModel();
        $users = $userModel->findAll();
        return view('layout/header') . view('empleado/profile', [
            'data' => $users
        ]) . view('layout/footer');
    }
}
