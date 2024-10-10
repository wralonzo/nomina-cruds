<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestamoModel extends Model
{
    protected $table = 'prestamo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['monto', 'cuotas', 'empleado', 'updated_at', 'created_at', 'saldo', 'cuotaspendientes'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Método para hacer el INNER JOIN con la tabla empleados
    public function getAll()
    {
        return $this->select('prestamo.id, prestamo.monto, prestamo.cuotas, prestamo.created_at, prestamo.saldo, prestamo.cuotaspendientes, empleado.nombres, empleado.apellidos')
            ->join('empleado', 'empleado.id = prestamo.empleado')
            ->findAll();
    }
}
