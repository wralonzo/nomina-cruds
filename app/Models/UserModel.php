<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user', 'email', 'password', 'role', 'name'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getUsers($limit = 10, $offset = 0, $filters = [])
    {
        if (!empty($filters['role'])) {
            $this->where('role', $filters['role']);
        }
        if (!empty($filters['name'])) {
            $this->like('name', $filters['name']);
        }

        return $this->findAll($limit, $offset);
    }

    public function getUserCount($filters = [])
    {
        if (!empty($filters['role'])) {
            $this->where('role', $filters['role']);
        }
        if (!empty($filters['name'])) {
            $this->like('name', $filters['name']);
        }

        return $this->countAllResults();
    }
}
