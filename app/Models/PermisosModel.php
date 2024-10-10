<?php

namespace App\Models;

use CodeIgniter\Model;

class PermisosModel extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['empleado', 'detalle', 'estado', 'created_at', 'update_at', 'fecha'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'update_at';


    // Método para hacer el INNER JOIN con la tabla empleados
    public function getPermisosWithEmpleados()
    {
        return $this->select('permisos.id, permisos.detalle, permisos.estado, permisos.created_at, permisos.fecha, empleado.nombres, empleado.apellidos')
            ->join('empleado', 'empleado.id = permisos.empleado')
            ->findAll();
    }
}
