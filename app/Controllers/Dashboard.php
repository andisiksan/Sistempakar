<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\Makananmodels;
use App\Models\PenyakitModels;

class Dashboard extends BaseController
{
    protected $gejalamodels;
    protected $makananmodel;
    protected $penyakitmodels;

    public function __construct()
    {
        $this->gejalamodels = new GejalaModels();
        $this->makananmodels = new MakananModels();
        $this->penyakitmodels = new PenyakitModels();
    }


    public function index()
    {
        // $kategori = $this->kategorimodel->findAll();
        $jumlahgejala = $this->gejalamodels->findAll();
        $jumlahpenyakit = $this->penyakitmodels->findAll();
        $jumlahmakanan = $this->makananmodels->findAll();
        // dd(count($jumlahgejala));


        // $a = 0;
        // foreach ($kategori as $row) {

        //     $totaljumlahkategori[$a] = [
        //         'namaKategori' => $row['nama_kategori'],
        //         'jumlah' => count($this->barangmodels->getKategoriBarang($row['id_kategori'])),
        //         'warna' => $row['warna']

        //     ];
        //     $a++;
        // }
        // dd($kategori);

        $data = [
            'title' => 'Dashboard',
            'gejala' => count($jumlahgejala),
            'penyakit' => count($jumlahpenyakit),
            'makanan' => count($jumlahmakanan),
        ];
        return view('/layout/dashboard', $data);
    }
}
