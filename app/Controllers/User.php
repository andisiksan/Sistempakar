<?php

namespace App\Controllers;

use App\Models\UserModels;

class User extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModels();
    }

    public function index()
    {
        $user = $this->userModel->where(['email' => session()->get('email')])->first();
        $userAll = $this->userModel->findAll();
        $data = [
            'title' => 'My Profile',
            'user' => $user,
            // 'var' => 'admin',
            'userAll' => $userAll,
        ];
        return view('layout/user', $data);
    }
    // jadikan admin
    public function update()
    {
        if ($this->userModel->save([
            'id' => $this->request->getVar("id"),
            'role_id' => 2,
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/user');
        }
    }
}
