<?php

namespace App\Controllers;

use App\Models\KonsultasiModel;
use App\Models\PenyakitModels;
use App\Models\UserModels;
use App\Models\MakananModels;
use App\Models\PasienModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->penyakitModels = new PenyakitModels();
        $this->usermodels = new UserModels();
        $this->makananModels = new MakananModels();
        $this->pasienModels = new PasienModel();
        $this->konsultasiModels = new KonsultasiModel();
    }

    public function index()
    {
        // $admin = $this->adminModel->where(['email' => session()->get('email')])->first();
        $penyakit = $this->penyakitModels->findAll();
        $data = [
            'title' => '',
            // 'admin' => $admin,
            'var' => 'admin',
            'penyakit' => $penyakit,
        ];
        return view('home/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Me',
            // 'admin' => $admin,
        ];
        return view('home/about', $data);
    }

    public function profile()
    {
        $user = $this->usermodels->where(['email' => session()->get('email')])->first();
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
