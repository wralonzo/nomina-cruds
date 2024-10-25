<?php

namespace App\Controllers;

use App\Models\DepartamentoModel;
use App\Models\DetalleFamiliarModel;
use App\Models\EmpleadoModel;
use App\Models\PermisosModel;
use App\Models\HorasExtrasModel;
use App\Models\PrestamoModel;
use App\Models\HistorialSalarioModel;
use App\Models\DocumentosModel;
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
        $detalleModel = new DetalleFamiliarModel();
        $permisoModel = new PermisosModel();
        $horaModel = new HorasExtrasModel();
        $prestamoModel = new PrestamoModel();
        $salarioModel = new HistorialSalarioModel();
        $docModel = new DocumentosModel();

        $detallesHijos = $detalleModel->where('empleado', $id)->where('tipo', 'Hijo')->orderBy('id', 'DESC')->findAll();
        $detallesEsposa = $detalleModel->where('empleado', $id)->where('tipo', 'esposa')->orderBy('id', 'DESC')->findAll();
        $permisos = $permisoModel->where('empleado', $id)->orderBy('id', 'DESC')->findAll();
        $horas = $horaModel->where('empleado', $id)->orderBy('id', 'DESC')->findAll();
        $prestamos = $prestamoModel->where('empleado', $id)->orderBy('id', 'DESC')->findAll();
        $salarios = $salarioModel->where('empleado', $id)->orderBy('id', 'DESC')->findAll();
        $docs = $docModel->where('empleado', $id)->orderBy('id', 'DESC')->findAll();
        return view('layout/header') . view('empleado/profile', [
            'data' => $users,
            'hijos' => $detallesHijos,
            'esposas' => $detallesEsposa,
            'empleado' => $id,
            'permisos' => $permisos,
            'horas' => $horas,
            'prestamos' => $prestamos,
            'salarios' => $salarios,
            'docs' => $docs,
        ]) . view('layout/footer');
    }
}
