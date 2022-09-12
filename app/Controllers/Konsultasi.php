<?php

namespace App\Controllers;


use App\Models\GejalaModels;
use App\Models\PenyakitModels;
use App\Models\UserModels;
use App\Models\BobotModel;
use App\Models\PasienModel;
use App\Models\KonsultasiModel;
use App\Models\DatacfModel;
use App\Models\MakananModels;

class Konsultasi extends BaseController
{
    public function __construct()
    {

        $this->gejalaModel = new GejalaModels();
        $this->penyakitModels = new PenyakitModels();
        $this->userModel = new UserModels();
        $this->bobotModel = new BobotModel();
        $this->pasienModel = new PasienModel();
        $this->konsultasiModel = new KonsultasiModel();
        $this->datacfModel = new DatacfModel();
        $this->makananModels = new MakananModels();
    }


    public function index()
    {
        if (session()->get('email') == null) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">anda harus login terlebih dahulu');
            return redirect()->to('/auth');
        } else {
            $bobot = $this->bobotModel->findByRole('user');
            $data = [
                'title' => "konsultasi",
                'penyakit' => $this->penyakitModels->findAll(),
                'selectPenyakit' => $this->gejalaModel->findAll(),
                'bobot' => $bobot
            ];
            return view('konsul/konsultasi', $data);
        }
    }

    public function detailuser()
    {
        $userAll = $this->userModel
            ->where(['role_id' => 3])
            ->findAll();
        $data = [
            'title' => 'Riwayat Konsultasi',
            'userAll' => $userAll,
        ];
        return view('konsul/detailuser', $data);
    }

    public function konsul()
    {
        $req = $this->request->getVar('id');
        if (!$req) {
            return redirect()->to('konsultasi');
        }
        $bobot = $this->bobotModel->findByRole('user');
        $gejala = $this->gejalaModel->getGejalaByPenyakit($req);

        $data = [
            'title' => "konsultasi",
            'penyakit' => $this->penyakitModels->findAll(),
            'selectPenyakit' => $gejala,
            'bobot' => $bobot
        ];
        return view('konsul/konsultasi', $data);
    }


    public function create()
    {
        $user = $this->userModel->where(['email' => session()->get('email')])->first();
        $idUser = $user['id'];
        $reqIdGejala = $this->request->getVar('idGejala');
        $reqCfUser = $this->request->getVar('cfUser');
        $reqIdPenyakit = $this->request->getVar('idPenyakit');

        $clear_duplicate_penyakit = array_unique($reqIdPenyakit);

        if (count($reqCfUser) != count($reqIdGejala)) {
            session()->setFlashdata('pesanGagal', 'Gejala Tidak Ditemukan');
            return redirect()->to('/konsultasi');
        }

        if ($idUser) {

            $hasilKonsultasi = [];

            foreach ($clear_duplicate_penyakit as $penyakit) {
                $CFHE = [];
                for ($i = 0; $i < count($reqIdGejala); $i++) {
                    $getGejalaById =  $this->gejalaModel->where(['idGejala' => $reqIdGejala[$i]])->first();
                    if (!$getGejalaById) {
                        session()->setFlashdata('pesanGagal', 'Gejala Tidak Ditemukan');
                        return redirect()->to('/konsultasi');
                    }
                    if ($penyakit == $getGejalaById['idPenyakit']) {
                        $CFHE[] = $getGejalaById['role'] * $reqCfUser[$i];
                    }
                }

                $old = $CFHE[0];
                for ($i = 1; $i < count($CFHE); $i++) {
                    if ($old >= 0 && $CFHE[$i] >= 0) {
                        $old = (($old) + ($CFHE[$i]) * (1 - ($old)));
                    } else if ($old < 0 && $CFHE[$i] < 0) {
                        $old = (($old) + ($CFHE[$i]) * (1 + ($old)));
                    } else {
                        $old = ((($old) + ($CFHE[$i])) / (1 - min($old, $CFHE[$i])));
                    }
                }

                $hasilKonsultasi[] = [
                    'cfHasil' => $old,
                    'idPenyakit' => $penyakit
                ];
            }

            if (!$this->pasienModel->insert(['idUser' => $idUser])) {
                session()->setFlashdata('pesanGagal', 'Konsultasi Gagal!');
                return redirect()->to('/konsultasi');
            }
            $idPasien = $this->pasienModel->getInsertID();
            foreach ($hasilKonsultasi as $konsul) {

                if (!$this->konsultasiModel->insert([
                    'idPasien' => $idPasien,
                    'cfHasil' => $konsul['cfHasil'] * 100,
                    'idPenyakit' => $konsul['idPenyakit']
                ])) {
                    session()->setFlashdata('pesanGagal', 'Konsultasi Gagal!');
                    return redirect()->to('/konsultasi');
                }

                $idKonsultasi = $this->konsultasiModel->getInsertID();

                $bobot = $this->bobotModel->findByRole('user');
                $nilai = array();
                foreach ($bobot as $b) {
                    $nilai[] = $b['nilai'];
                }
                for ($i = 0; $i < count($reqIdPenyakit); $i++) {
                    if ($reqIdPenyakit[$i] == $konsul['idPenyakit']) {

                        $index = array_search(strval($reqCfUser[$i]), $nilai, true);

                        if (!$this->datacfModel->insert([
                            'idKonsultasi' => $idKonsultasi,
                            'idGejala' => $reqIdGejala[$i],
                            'ket' => $bobot[$index]['ket'],
                            'cfUser' => $reqCfUser[$i]

                        ])) {
                            session()->setFlashdata('pesanGagal', 'Konsultasi Gagal!');
                            return redirect()->to('/konsultasi');
                        }
                    }
                }
            }

            session()->setFlashdata('pesan', 'konsultasi berhasil.');
            return redirect()->to('/konsultasi/' . $idPasien);
        } else {
            session()->setFlashdata('pesanGagal', 'User tidak ditemukan!');
            return redirect()->to('/konsultasi');
        }
    }

    public function hasil($idPasien)
    {
        $konsultasis = $this->konsultasiModel->getDataKonsulTertinggi($idPasien);
        dd($konsultasis);
        $old = 0;
        $oldlevel = 0;
        $konsultasi = $konsultasis[0];
        for ($i = 0; $i < count($konsultasis); $i++) {
            if ($konsultasi['cfHasil'] < $konsultasis[$i]['cfHasil']) {
                $konsultasi = $konsultasis[$i];
            }
            if ($konsultasi['cfHasil'] == $konsultasis[$i]['cfHasil']) {
                if ($konsultasi['level'] < $konsultasis[$i]['level']) {
                    $konsultasi = $konsultasis[$i];
                }
            }
            $old = $konsultasis[$i]['cfHasil'];
            $oldlevel = $konsultasis[$i]['level'];
        }

        // dd($konsultasi);
        $rekomendasi = [];
        // memecahkan penyakit

        // mencari makanan berdasarkan id penyakit
        $makanan = $this->makananModels
            ->where(['idPenyakit' => $konsultasi['idPenyakit']])
            ->where(['status' => 'rekomendasi'])
            ->findAll();
        for ($i2 = 0; $i2 < count($makanan); $i2++) {
            $rekomendasi[] = $makanan[$i2];
        }

        $larangan = [];
        // memecahkan penyakit

        // mencari makanan berdasarkan id penyakit
        $makanan = $this->makananModels
            ->where(['idPenyakit' => $konsultasi['idPenyakit']])
            ->where(['status' => 'larangan'])
            ->findAll();
        for ($i2 = 0; $i2 < count($makanan); $i2++) {
            $larangan[] = $makanan[$i2];
        }
        $data = [
            'title' => "hasil konsultasi",
            'subtitle' => "hasil konsultasi",
            'konsultasi' => $konsultasi,
            'rekomendasi' => $rekomendasi,
            'larangan' => $larangan,
            'konsultasis' => $konsultasis,
        ];
        return view('/konsul/hasil', $data);
    }

    // delete
    public function delete($idPasien)
    {
        $data = $this->konsultasiModel->select('id')->where(['idPasien' => $idPasien])->findAll();
        foreach ($data as $val) {
            $this->datacfModel->where(['idKonsultasi' => $val['id']])->delete();
        }
        $this->konsultasiModel
            ->where(['idPasien' => $idPasien])->delete();
        $delete = $this->pasienModel
            ->where(['id' => $idPasien])->delete();

        // ->where(['idKonsultasi' => $konsultasi[$i]['id']])->delete();

        if ($delete) {
            session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
            return redirect()->to('/konsultasi/detailuser/');
        } else {
            session()->setFlashdata('pesan', 'Data Gagal Di Hapus');
        }
    }
}
