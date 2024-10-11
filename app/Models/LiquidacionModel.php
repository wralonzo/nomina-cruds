<?php

namespace App\Models;

use CodeIgniter\Model;

class LiquidacionModel extends Model
{
    protected $table = 'liquidacion';
    protected $primaryKey = 'id';
    protected $allowedFields = ['monto', 'fecha', 'empleado', 'updated_at', 'created_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Método para hacer el INNER JOIN con la tabla empleados
    public function getAll()
    {
        return $this->select('liquidacion.id, liquidacion.monto, liquidacion.fecha, empleado.nombres, empleado.apellidos')
            ->join('empleado', 'empleado.id = liquidacion.empleado')
            ->findAll();
    }
}
