<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleFamiliarModel extends Model
{
    protected $table = 'detalle_familiar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tipo', 'nombres', 'edad', 'empleado', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
