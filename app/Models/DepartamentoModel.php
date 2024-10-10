<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartamentoModel extends Model
{
    protected $table = 'departamento';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'porcentaje_comision'];
}
