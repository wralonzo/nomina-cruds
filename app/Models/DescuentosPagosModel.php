<?php

namespace App\Models;

use CodeIgniter\Model;

class DescuentosPagosModel extends Model
{
    protected $table = 'descuentos_pagos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['empleado', 'monto', 'detalle', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Método para hacer el INNER JOIN con la tabla empleados
    public function getAll()
    {
        return $this->select('descuentos_pagos.id, descuentos_pagos.monto, descuentos_pagos.detalle, descuentos_pagos.created_at, empleado.nombres, empleado.apellidos')
            ->join('empleado', 'empleado.id = descuentos_pagos.empleado')
            ->findAll();
    }
}
