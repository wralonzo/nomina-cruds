<?php

namespace App\Models;

use CodeIgniter\Model;

class NominaModel extends Model
{
    protected $table = 'nomina';
    protected $primaryKey = 'id';
    protected $allowedFields = ['monto', 'bonificaciones', 'descuentos', 'updated_at', 'created_at', 'total', 'empleado'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Método para hacer el INNER JOIN con la tabla empleados
    public function getAll()
    {
        return $this->select('nomina.id, nomina.bonificaciones, nomina.descuentos, nomina.monto, nomina.created_at, nomina.total, empleado.nombres, empleado.apellidos')
            ->join('empleado', 'empleado.id = nomina.empleado')
            ->findAll();
    }
}
