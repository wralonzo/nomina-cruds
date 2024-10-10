<?php

namespace App\Models;

use CodeIgniter\Model;

class HorasExtrasModel extends Model
{
    protected $table = 'horas_extras';
    protected $primaryKey = 'id';
    protected $allowedFields = ['horas', 'monto', 'festivo', 'created_at', 'update_at', 'empleado', 'estado'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'update_at';


    // Método para hacer el INNER JOIN con la tabla empleados
    public function getAll()
    {
        return $this->select('horas_extras.id, horas_extras.horas, horas_extras.monto, horas_extras.created_at, horas_extras.festivo, horas_extras.created_at, empleado.nombres, empleado.apellidos')
            ->join('empleado', 'empleado.id = horas_extras.empleado')
            ->findAll();
    }
}
