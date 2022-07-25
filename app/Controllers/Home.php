<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\PenyakitModels;

class Home extends BaseController
{
    public function __construct()
    {
        $this->gejalaModels = new GejalaModels();
        $this->penyakitModels = new PenyakitModels();
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
        return view('Home/index', $data);
    }

    public function diagnosa()
    {
        $gejala = $this->gejalaModels->findAll();
        $penyakit = $this->penyakitModels->findAll();

        $data = [
            'title' => 'Diagnosa',
            'gejala' => $gejala,
            'penyakit' => $penyakit,
        ];

        return view('Home/diagnosa', $data);
    }


    public function hasilDiaganosa()
    {
        $data = [
            'title' => 'Hasil Diagnosa',
        ];

        return view('Home/hasildiagnosa', $data);
    }
}
