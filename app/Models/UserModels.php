<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;

    // tentukan field yg boleh user isi
    protected $allowedFields = ['name', 'email', 'image', 'password', 'role_id', 'is_active'];

    public function detailUser($id)
    {
        return $this
            ->where(['id' => $id])->first();
    }
}
