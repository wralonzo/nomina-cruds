<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layout/header') . view('welcome_message') . view('layout/footer');
    }
}
