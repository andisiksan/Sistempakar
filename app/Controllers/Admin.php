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
        $user = $this->adminModel->findAll();
        $data = [
            'title' => 'My Profile',
            'admin' => $admin,
            'var' => 'admin',
            'user' => $user,
        ];
        return view('layout/admin', $data);
    }
}
