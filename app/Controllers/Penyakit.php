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
                'nama_penyakit' => [
                    'rules' => 'required[penyakit.nama_penyakit]',
                    'errors' => [
                        'required' => '{field} input harus diisi',
                    ]
                ],
            ]

        )) {
            return \redirect()->to('/penyakit/create');
        }

        if ($this->penyakitmodels->save([
            'nama_penyakit' => $this->request->getVar("nama_penyakit"),
            'tentang_penyakit' => $this->request->getVar("tentang_penyakit"),
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
    public function delete($id_penyakit)
    {
        $this->penyakitmodels->delete($id_penyakit);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/penyakit');
    }

    // edit
    public function edit($id_penyakit)
    {
        $data = [
            'title' => 'Edit Penyakit',
            'penyakit' => $this->penyakitmodels->editPenyakit($id_penyakit),
        ];
        return view('penyakit/edit', $data);
    }

    // update
    public function update()
    {
        if ($this->penyakitmodels->save([
            'id_penyakit' => $this->request->getVar("id_penyakit"),
            'nama_penyakit' => $this->request->getVar("nama_penyakit"),
            'tentang_penyakit' => $this->request->getVar("tentang_penyakit"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/penyakit');
        }
    }
}
