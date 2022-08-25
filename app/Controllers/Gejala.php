<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\PenyakitModels;
use App\Models\BobotModel;

class Gejala extends BaseController
{
    protected $gejalamodels;
    protected $penyakitmodels;
    protected $bobotmodels;

    public function __construct()
    {
        $this->gejalamodels = new GejalaModels();
        $this->penyakitmodels = new PenyakitModels();
        $this->bobotmodels = new BobotModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Data Gejala',
            'gejala' => $this->gejalamodels->getGejala(),
        ];

        return view('gejala/list', $data);
    }

    // create
    public function create()
    {
        $data = [
            'title' => 'Tambah Gejala',
            'bobot' => $this->bobotmodels
                ->where(['role' => 'admin'])
                ->findAll(),
            'penyakit' => $this->penyakitmodels->findAll(),
        ];
        return view('gejala/create', $data);
    }


    // save
    public function save()
    {
        if (!$this->validate(
            [
                'namaGejala' => [
                    'rules' => 'required[gejala.namaGejala]',
                    'errors' => [
                        'required' => '{field} input harus diisi',
                    ]
                ],
            ]

        )) {
            return redirect()->to('/gejala/create');
        }

        if ($this->gejalamodels->save([
            'namaGejala' => $this->request->getVar("namaGejala"),
            'role' => $this->request->getVar("role"),
            'idPenyakit' => $this->request->getVar("penyakit"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to('/gejala');
        } else {
            echo 'gagal';
        }
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan .');
        return redirect()->to('/home');
    }
    // delete
    public function delete($idGejala)
    {
        $this->gejalamodels->delete($idGejala);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/gejala');
    }

    // edit
    public function edit($idGejala)
    {
        $data = [
            'title' => 'Edit Gejala',
            'gejala' => $this->gejalamodels->editGejala($idGejala),
            'bobot' => $this->bobotmodels
                ->where(['role' => 'admin'])
                ->findAll(),
            'penyakit' => $this->penyakitmodels->findAll(),
        ];
        return view('gejala/edit', $data);
    }

    public function update()
    {
        if ($this->gejalamodels->save([
            'idGejala' => $this->request->getVar('idGejala'),
            'namaGejala' => $this->request->getVar("namaGejala"),
            'role' => $this->request->getVar("bobot"),
            'idPenyakit' => $this->request->getVar("penyakit"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/gejala');
        }
    }
}
