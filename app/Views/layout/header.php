<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de nominas</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body class="blue lighten-5"> <!-- Fondo suave -->

    <!-- Navbar -->
    <nav class="blue">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Sistema de control de nomina</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?= base_url('auth/update/') ?><?= session()->get('id') ? session()->get('id') : ''  ?>">Perfil</a></li>
                <li><a href="<?= base_url() ?>auth/logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQPF3q8wloOPxxQE4UnsqW3IY-5pYnAmSCgQ&s" alt="background" class="responsive-img"> -->
                </div>
                <a href="#user"><img class="circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQPF3q8wloOPxxQE4UnsqW3IY-5pYnAmSCgQ&s" alt="user"></a>
                <a href="#name"><span class="black-text name"><?= session()->get('name') ? session()->get('name') : ''  ?></span></a>
                <a href="#email"><span class="black-text email"><?= session()->get('email') ? session()->get('email') : ''  ?></span></a>
            </div>
        </li>
        <li><a href="<?= base_url('dashboard') ?>"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="<?= base_url('auth/display') ?>"><i class="material-icons">group</i>Usuarios</a></li>
        <li><a href="<?= base_url('empleado/display') ?>"><i class="material-icons">business</i>Empleado</a></li>
        <li><a href="<?= base_url('nomina/display') ?>"><i class="material-icons">assignment</i>Nominas</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Otros</a></li>
        <li><a href="<?= base_url('departamento/display') ?>"><i class="material-icons">assignment</i>Departamentos</a></li>
        <li><a href="<?= base_url('descuentofijo/display') ?>"><i class="material-icons">assignment</i>Descuento Fijo</a></li>
        <li><a href="<?= base_url('permiso/display') ?>"><i class="material-icons">assignment</i>Permisos</a></li>
        <li><a href="<?= base_url('horaextra/display') ?>"><i class="material-icons">assignment</i>Horas extras</a></li>
        <li><a href="<?= base_url('prestamo/display') ?>"><i class="material-icons">assignment</i>Prestamos</a></li>
        <li><a href="<?= base_url('cobro/display') ?>"><i class="material-icons">assignment</i>Crobros/Descuentos</a></li>
        <li><a href="<?= base_url('liquidacion/display') ?>"><i class="material-icons">assignment</i>Liquidaciones</a></li>
    </ul>