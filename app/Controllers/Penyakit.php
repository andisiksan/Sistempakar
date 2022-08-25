<?php

namespace App\Controllers;

use App\Models\PenyakitModels;

class Penyakit extends BaseController
{
    protected $penyakitmodels;
    public function __construct()
    {
        $this->penyakitmodels = new PenyakitModels();
    }


    public function index()
    {
        $data = [
            'title' => 'Data Penyakit',
            'penyakit' => $this->penyakitmodels->findAll(),
        ];

        return view('penyakit/list', $data);
    }

    // create
    public function create()
    {
        $data = [
            'title' => 'Tambah Penyakit',
        ];

        return view('penyakit/create', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'namaPenyakit' => [
                    'rules' => 'required[penyakit.namaPenyakit]',
                    'errors' => [
                        'required' => '{field} input harus diisi',
                    ]
                ],
            ]

        )) {
            return \redirect()->to('/penyakit/create');
        }

        if ($this->penyakitmodels->save([
            'namaPenyakit' => $this->request->getVar("namaPenyakit"),
            'detailPenyakit' => $this->request->getVar("detailPenyakit"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to('/penyakit');
        } else {
            echo 'gagal';
        }
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan .');
        return redirect()->to('/penyakit');
    }
    // delete
    public function delete($idPenyakit)
    {
        $this->penyakitmodels->delete($idPenyakit);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/penyakit');
    }

    // edit
    public function edit($idPenyakit)
    {
        $data = [
            'title' => 'Edit Penyakit',
            'penyakit' => $this->penyakitmodels->editPenyakit($idPenyakit),
        ];
        return view('penyakit/edit', $data);
    }

    // update
    public function update()
    {
        if ($this->penyakitmodels->save([
            'idPenyakit' => $this->request->getVar("idPenyakit"),
            'namaPenyakit' => $this->request->getVar("namaPenyakit"),
            'detailPenyakit' => $this->request->getVar("detailPenyakit"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/penyakit');
        }
    }
}
