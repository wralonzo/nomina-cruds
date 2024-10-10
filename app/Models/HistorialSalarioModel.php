<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialSalarioModel extends Model
{
    protected $table = 'historial_salario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['monto', 'estado', 'empleado', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
