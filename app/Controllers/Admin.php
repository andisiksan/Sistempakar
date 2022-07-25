<?php

namespace App\Controllers;

use App\Models\AdminModels;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->adminModel = new AdminModels();
    }

    public function index()
    {
        $admin = $this->adminModel->where(['email' => session()->get('email')])->first();

        $data = [
            'title' => 'My Profile',
            'admin' => $admin,
            'var' => 'admin',
        ];
        return view('layout/admin', $data);
    }
}
