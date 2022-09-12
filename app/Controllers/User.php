<?php

namespace App\Controllers;

use App\Models\KonsultasiModel;
use App\Models\PenyakitModels;
use App\Models\UserModels;
use App\Models\MakananModels;
use App\Models\PasienModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->penyakitModels = new PenyakitModels();
        $this->userModel = new UserModels();
        $this->makananModels = new MakananModels();
        $this->pasienModels = new PasienModel();
        $this->konsultasiModels = new KonsultasiModel();
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

    // tambahkanfoto
    public function savegambar()
    {
        // ambil gambar
        $fileimage = $this->request->getFile("image");

        // ambil nama
        $namaimage = $fileimage->getRandomName();


        // pindahkan file
        $fileimage->move('img', $namaimage);

        // ambil nama file
        // $namaimage = $fileimage->getName();
        if ($this->userModel->save(
            [
                'id' => $this->request->getVar("id"),
                'image' => $namaimage,
            ]
        )) {
            session()->setFlashdata('pesan', 'Gambar Berhasil Di Ubah');
            return redirect()->to('/user');
        } else {
            echo 'gagal';
        }
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

    public function detail($id)
    {
        $user = $this->userModel->detailUser($id);
        $pasien = $this->pasienModels->where(['idUser' => $user['id']])->findAll();
        for ($i = 0; $i < count($pasien); $i++) {
            $pasien[$i]['konsultasi'] = $this->konsultasiModels->getKonsul($pasien[$i]['id']);
        }
        $data = [
            'title' => 'Pasien',
            'user' => $user,
            'pasien' => $pasien
        ];
        return view('konsul/pasien', $data);
    }

 
}
