<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\PenyakitModels;

class Gejala extends BaseController
{
    protected $gejalamodels;
    protected $penyakitmodels;

    public function __construct()
    {
        $this->gejalamodels = new GejalaModels();
        $this->penyakitmodels = new PenyakitModels();
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
            'gejala' => $this->gejalamodels->findAll(),
            'penyakit' => $this->penyakitmodels->findAll(),
        ];
        return view('gejala/create', $data);
    }


    // save
    public function save()
    {
        if (!$this->validate(
            [
                'input_gejala' => [
                    'rules' => 'required[gejala.input_gejala]',
                    'errors' => [
                        'required' => '{field} input harus diisi',
                    ]
                ],
            ]

        )) {
            return \redirect()->to('/gejala/create');
        }

        if ($this->gejalamodels->save([
            'input_gejala' => $this->request->getVar("input_gejala"),
            'id_penyakit' => $this->request->getVar("penyakit"),
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
    public function delete($id_gejala)
    {
        $this->gejalamodels->delete($id_gejala);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/gejala');
    }

    // edit
    public function edit($id_gejala)
    {
        $data = [
            'title' => 'Edit Gejala',
            'gejala' => $this->gejalamodels->editGejala($id_gejala),
        ];
        return view('gejala/edit', $data);
    }

    public function update()
    {
        if ($this->gejalamodels->save([
            'id_gejala' => $this->request->getVar('id_gejala'),
            'input_gejala' => $this->request->getVar("input_gejala"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/gejala');
        }
    }
}
