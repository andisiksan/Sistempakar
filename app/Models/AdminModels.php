<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModels extends Model
{
    protected $table = 'admin';
    // protected $useTimestamps = true;

    // tentukan field yg boleh user isi
    protected $allowedFields = ['name', 'email', 'image', 'password', 'role_id', 'is_active'];
}
