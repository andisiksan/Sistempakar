<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\Makananmodels;
use App\Models\PenyakitModels;
use App\Models\PasienModel;

class Dashboard extends BaseController
{
    protected $gejalamodels;
    protected $makananmodel;
    protected $penyakitmodels;
    protected $pasienmodel;

    public function __construct()
    {
        $this->gejalamodels = new GejalaModels();
        $this->makananmodels = new MakananModels();
        $this->penyakitmodels = new PenyakitModels();
        $this->pasienmodel = new PasienModel();
    }


    public function index()
    {
        // $kategori = $this->kategorimodel->findAll();
        $jumlahgejala = $this->gejalamodels->findAll();
        $jumlahpenyakit = $this->penyakitmodels->findAll();
        $jumlahmakanan = $this->makananmodels->findAll();
        $jumlahpasien = $this->pasienmodel->findAll();
        // dd(count($jumlahgejala));

        $data = [
            'title' => 'Dashboard',
            'gejala' => count($jumlahgejala),
            'penyakit' => count($jumlahpenyakit),
            'makanan' => count($jumlahmakanan),
            'pasien' => count($jumlahpasien),
        ];
        return view('/layout/dashboard', $data);
    }
}
