<?php

namespace App\Controllers;

use App\Models\DocumentosModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class DocumentoController extends ResourceController
{
    public function register()
    {
        $empleado = $this->request->getGet('id');
        try {
            $session = session();
            if (!$this->request->getPost()) {
                return view('layout/header') . view('documento/register', ['empleado' => $empleado]) . view('layout/footer');
            }

            $file = $this->request->getFile('archivo');
            $nombreArchivo = '';
            if ($file->isValid() && !$file->hasMoved()) {
                $nombreArchivo = $file->getRandomName();
                $rutaDestino = '../public/uploads/';
                if (!is_dir($rutaDestino)) {
                    mkdir($rutaDestino, 0777, true);
                }

                // Intenta mover el archivo
                if ($file->move($rutaDestino, $nombreArchivo)) {
                    echo "Archivo movido exitosamente a: " . $nombreArchivo;
                } else {
                    echo "Error al mover el archivo.";
                }
            }

            $data = [
                'nombre'     => $this->request->getVar('nombre'),
                'path'     => $nombreArchivo,
                'empleado' => $empleado
            ];
            $model = new DocumentosModel();
            $model->save($data);
            $session->setFlashdata('msg', 'El registro ha sido creado');
            return redirect()->to('/empleado/findone/' . $empleado);
        } catch (Exception $e) {
            return redirect()->to('/empleado/findone/' . $empleado);
        }
    }

    public function upgrade($id)
    {
        try {
            $model = new DocumentosModel();
            $session = session();
            if (!$this->request->getVar()) {
                $user = $model->find($id);
                if (!$user) {
                    $session->setFlashdata('msg', 'El registro no existe');
                    return redirect()->to('/empleado/findone/' . $id);
                }
                $modeldeptos = new DocumentosModel();
                $deptos = $modeldeptos->findAll();
                return view('layout/header') . view('familia/update', ['data' => $user, 'deptos' => $deptos]) . view('layout/footer');
            }
            $model->update($id, $this->request->getVar());
            $session->setFlashdata('msg', 'El registro ha sido actualizado');
            return redirect()->to('/empleado/findone/' . $id);
        } catch (Exception $e) {
            return redirect()->to('/empleado/findone/' . $id);
        }
    }

    public function remove($id)
    {
        $session = session();
        try {
            $model = new DocumentosModel();
            $record = $model->find($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro ya fue eliminado o no existe');
                return redirect()->to('/empleado/findone/' . $record['empleado']);
            }
            $model->delete($id);
            if (!$record) {
                $session->setFlashdata('msg', 'El registro no fue eliminado');
                return redirect()->to('/empleado/findone/' . $id);
            }
            $session->setFlashdata('msg', 'El registro fue eliminado');
            return redirect()->to('/empleado/findone/' . $record['empleado']);
        } catch (Exception $e) {
            $session->setFlashdata('msg', 'El registro no fue eliminado, esta relacionado a otro registro');
            return redirect()->to('/empleado/display');
        }
    }
}
