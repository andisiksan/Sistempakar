<?php

namespace App\Models;

use CodeIgniter\Model;

class BobotModel extends Model
{

    protected $table            = 'bobot';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'ket', 'nilai', 'role'];

    public function findByRole($role)
    {
        return $this
            ->where(['role' => $role])
            ->select(['id', 'ket', 'nilai'])
            ->findAll();
    }
}
