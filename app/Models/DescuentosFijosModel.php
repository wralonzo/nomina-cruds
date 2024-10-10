<?php

namespace App\Models;

use CodeIgniter\Model;

class DescuentosFijosModel extends Model
{
    protected $table = 'descuentos_fijos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['porcentaje', 'nombre'];
}
