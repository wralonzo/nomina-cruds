<?php

namespace App\Controllers;

use App\Models\DepartamentoModel;
use App\Models\DetalleFamiliarModel;
use App\Models\UserModel;
use App\Models\EmpleadoModel;
use App\Models\PermisosModel;
use App\Models\HorasExtrasModel;
use App\Models\PrestamoModel;
use App\Models\HistorialSalarioModel;
use App\Models\DocumentosModel;

class Home extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $empleadoModel = new EmpleadoModel();
        $deptoModel = new DepartamentoModel();

        $usuarios = $userModel->countAll();
        $empleados = $empleadoModel->countAll();
        $deptos = $deptoModel->countAll();
        return view('layout/header') . view('welcome_message', [
            'usuarios' => $usuarios,
            'empleados' => $empleados,
            'deptos' => $deptos,
        ]) . view('layout/footer');
    }
}
