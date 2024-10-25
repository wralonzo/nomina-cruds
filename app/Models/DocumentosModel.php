<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentosModel extends Model
{
    protected $table = 'documentos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['path', 'nombre', 'empleado', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
