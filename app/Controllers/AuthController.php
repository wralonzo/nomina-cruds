<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class AuthController extends ResourceController
{
    public function register()
    {
        try {
            $session = session();
            if (!$this->request->getVar()) {
                return view('layout/header') . view('auth/register') . view('layout/footer');
            }
            $data = [
                'email'         => $this->request->getVar('email'),
                'role'          => $this->request->getVar('role'),
                'name'          => $this->request->getVar('name'),
                'user'          => $this->request->getVar('user'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            $userModel = new UserModel();
            $userModel->save($data);
            // $errors = $userModel->errors();
            // var_dump($errors);
            // var_dump($dataSave);
            $session->setFlashdata('msg', 'El usuario ha sido creado');
            return redirect()->to('/auth/display');
        } catch (Exception $e) {
            return redirect()->to('/dashboard');
        }
    }
    public function login()
    {
        $session = session();
        $rules = [
            'email'    => 'required|min_length[3]',
            'password' => 'required|min_length[3]',
        ];
        if (!$this->validate($rules)) {
            $session->setFlashdata('msg', 'El usuario y la contraseña deben ser mayores a 3 caracteres');
            return redirect()->to('/')->withInput()->with('errors', $this->validator->getErrors());;
        }

        $userModel = new UserModel();
        $user = $userModel->where('user', $this->request->getVar('email'))->first();
        if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
            $session_data = [
                'id' => $user['id'],
                'user' => $user['user'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
                'logged_in' => TRUE
            ];
            $session->set($session_data);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'Usuario o contraseña incorrectos');
            return redirect()->to('/');
        }
    }

    public function users()
    {
        $userModel = new UserModel();
        $filters = [
            'role' => $this->request->getVar('role'),
            'name' => $this->request->getVar('name'),
        ];

        // Configuración de paginación
        $limit = 10; // Cambia esto según tus necesidades
        $page = $this->request->getVar('page') ?: 1;
        $offset = ($page - 1) * $limit;

        // Obtener usuarios
        $users = $userModel->getUsers($limit, $offset, $filters);
        $totalUsers = $userModel->getUserCount($filters);
        $totalPages = ceil($totalUsers / $limit);
        return view('layout/header') . view('auth/display', [
            'users' => $users,
            'filters' => $filters,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ]) . view('layout/footer');
    }

    public function updateUser($id)
    {
        try {
            $userModel = new UserModel();
            $session = session();
            if (!$this->request->getVar()) {
                $user = $userModel->find($id);
                if (!$user) {
                    $session->setFlashdata('msg', 'El usuario no existe');
                    return redirect()->to('/auth/display');
                }
                return view('layout/header') . view('auth/update', ['data' => $user]) . view('layout/footer');
            }
            $data = $this->request->getVar();
            if ($data['password'] != null) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            } else {
                unset($data['password']);
            }

            $userModel->update($id, $data);
            $session->setFlashdata('msg', 'El usuario ha sido actualizado');
            return redirect()->to('/auth/display');
        } catch (Exception $e) {
            return $this->failServerError('An error occurred: ' . $e->getMessage());
        }
    }

    public function deleteOne($id)
    {
        $session = session();
        try {
            $model = new UserModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El usuario ya fue eliminado o no existe');
                return redirect()->to('/auth/display');
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El usuario no fue eliminado');
                return redirect()->to('/auth/display');
            }
            $session->setFlashdata('msg', 'El usuario fue eliminado');
            return redirect()->to('/auth/display');
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El usuario no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/auth/display');
        }
    }

    public function loginView()
    {
        helper(['form']);
        echo view('auth/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
