<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\MakananModels;
use App\Models\PenyakitModels;
use App\Models\PasienModel;
use App\Models\UserModels;


class Dashboard extends BaseController
{
    protected $gejalamodels;
    protected $makananmodel;
    protected $penyakitmodels;
    protected $pasienmodel;
    protected $usermodel;

    public function __construct()
    {
        $this->gejalamodels = new GejalaModels();
        $this->makananmodels = new MakananModels();
        $this->penyakitmodels = new PenyakitModels();
        $this->pasienmodel = new PasienModel();
        $this->usermodel = new UserModels();
    }


    public function index()
    {
        // $kategori = $this->kategorimodel->findAll();
        $jumlahgejala = $this->gejalamodels->findAll();
        $jumlahpenyakit = $this->penyakitmodels->findAll();
        $jumlahmakanan = $this->makananmodels->findAll();
        $jumlahpasien = $this->pasienmodel->findAll();
        $userAll = $this->usermodel
            ->where(['role_id' => 3])
            ->findAll();
        // dd(count($jumlahgejala));

        $data = [
            'title' => 'Dashboard',
            'gejala' => count($jumlahgejala),
            'penyakit' => count($jumlahpenyakit),
            'makanan' => count($jumlahmakanan),
            'pasien' => count($userAll),
        ];
        return view('/layout/dashboard', $data);
    }
}
