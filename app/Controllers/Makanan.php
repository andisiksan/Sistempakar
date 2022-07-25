<?php

namespace App\Controllers;

use App\Models\MakananModels;

class Makanan extends BaseController
{
    protected $makananmodels;
    public function __construct()
    {
        $this->makananmodels = new MakananModels();
    }


    public function index()
    {
        $data = [
            'title' => 'Data Makanan',
            'makanan' => $this->makananmodels->findAll(),
        ];

        return view('makanan/list', $data);
    }
    // create
    public function create()
    {
        $data = [
            'title' => 'Tambah Makanan',
        ];
        return view('makanan/create', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'nama_makanan' => [
                    'rules' => 'required[makanan.nama_makanan]',
                    'errors' => [
                        'required' => '{field} input harus diisi',
                    ]
                ],
            ]

        )) {
            return \redirect()->to('/makanan/create');
        }

        if ($this->makananmodels->save([
            'nama_makanan' => $this->request->getVar("nama_makanan"),
            'detail_makanan' => $this->request->getVar("detail_makanan"),
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
    public function delete($id_makanan)
    {
        $this->makananmodels->delete($id_makanan);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to('/makanan');
    }

    // edit
    public function edit($id_makanan)
    {
        $data = [
            'title' => 'Edit Makanan',
            'makanan' => $this->makananmodels->editMakanan($id_makanan),
        ];
        return view('makanan/edit', $data);
    }

    // update
    public function update()
    {
        if ($this->makananmodels->save([
            'id_makanan' => $this->request->getVar('id_makanan'),
            'id_penyakit' => $this->request->getVar("id_penyakit"),
            'nama_makanan' => $this->request->getVar("nama_makanan"),
            'detail_makanan' => $this->request->getVar("detail_makanan"),
            'status' => $this->request->getVar("status"),
        ])) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
            return redirect()->to('/makanan');
        }
    }
}
