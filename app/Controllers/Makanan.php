<?php

namespace App\Controllers;

use App\Models\MakananModels;
use App\Models\PenyakitModels;

class Makanan extends BaseController
{
    protected $makananmodels;
    protected $penyakitModels;
    public function __construct()
    {
        $this->makananmodels = new MakananModels();
        $this->penyakitModels = new PenyakitModels();
    }


    public function index()
    {
        $data = [
            'title' => 'Data Makanan',
            'makanan' => $this->makananmodels->getPenyakit(),
        ];

        return view('makanan/list', $data);
    }
    // create
    public function create()
    {
        $data = [
            'title' => 'Tambah Makanan',
            'penyakit' => $this->penyakitModels->findAll(),
        ];
        return view('makanan/create', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'namaMakanan' => [
                    'rules' => 'required[makanan.namaMakanan]',
                    'errors' => [
                        'required' => '{field} input harus diisi',
                    ]
                ],
            ]

        )) {
            return redirect()->to('/makanan/create');
        }

        if ($this->makananmodels->save([
            'namaMakanan' => $this->request->getVar("namaMakanan"),
            'detailMakanan' => $this->request->getVar("detailMakanan"),
            'idPenyakit' => $this->request->getVar("penyakit"),
            'status' => $this->request->getVar("status"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to('/makanan');
        } else {
            echo 'gagal';
        }
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan .');
        return redirect()->to('/makanan');
    }
    // delete
    public function delete($idMakanan)
    {
        $this->makananmodels->delete($idMakanan);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/makanan');
    }

    // edit
    public function edit($idMakanan)
    {
        $data = [
            'title' => 'Edit Makanan',
            'makanan' => $this->makananmodels->editMakanan($idMakanan),
            'penyakit' => $this->penyakitModels->findAll(),
        ];
        return view('makanan/edit', $data);
    }

    // update
    public function update()
    {
        if ($this->makananmodels->save([
            'idMakanan' => $this->request->getVar('idMakanan'),
            'idPenyakit' => $this->request->getVar("penyakit"),
            'namaMakanan' => $this->request->getVar("namaMakanan"),
            'detailMakanan' => $this->request->getVar("detailMakanan"),
            'status' => $this->request->getVar("status"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/makanan');
        }
    }
}
