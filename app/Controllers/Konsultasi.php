<?php

namespace App\Controllers;


use App\Models\GejalaModels;
use App\Models\GejalaModel;
use App\Models\PenyakitModels;
use App\Models\AdminModels;
use App\Models\BobotModel;
use App\Models\PasienModel;
use App\Models\KonsultasiModel;
use App\Models\DatacfModel;

class Konsultasi extends BaseController
{
    public function __construct()
    {
        $this->gejalaModels = new GejalaModels();
        $this->gejalaModel = new GejalaModel();
        $this->penyakitModels = new PenyakitModels();
        $this->adminModels = new AdminModels();
        $this->bobotModel = new BobotModel();
        $this->pasienModel = new PasienModel();
        $this->konsultasiModel = new KonsultasiModel();
        $this->datacfModel = new DatacfModel();
    }


    public function index()
    {
        $data = [
            'title' => "konsultasi",
            'subtitle' => "konsultasi",
            'penyakit' => $this->penyakitModels->findAll(),
            'selectPenyakit' => null
        ];
        return view('konsul/konsultasi', $data);
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
            'subtitle' => "konsultasi",
            'penyakit' => $this->penyakitModels->findAll(),
            'selectPenyakit' => $gejala,
            'bobot' => $bobot
        ];
        return view('konsul/konsultasi', $data);
    }

    public function create()
    {
        $user = $this->adminModels->where(['email' => session()->get('email')])->first();
        $idUser = $user['id'];
        $reqIdGejala = $this->request->getVar('idGejala');
        $reqCfUser = $this->request->getVar('cfUser');
        $reqIdPenyakit = $this->request->getVar('idPenyakit');

        $clear_duplicate_penyakit = array_unique($reqIdPenyakit);

        if (count($reqCfUser) != count($reqIdGejala)) {
            session()->setFlashdata('pesanGagal', 'Gejalak Tidak Ditemukan');
            return redirect()->to('/konsultasi');
        }

        if ($idUser) {

            $hasilKonsultasi = [];

            foreach ($clear_duplicate_penyakit as $penyakit) {
                $CFHE = [];
                for ($i = 0; $i < count($reqIdGejala); $i++) {
                    $getGejalaById =  $this->gejalaModel->where(['id_gejala' => $reqIdGejala[$i]])->first();
                    if (!$getGejalaById) {
                        session()->setFlashdata('pesanGagal', 'Gejala Tidak Ditemukan');
                        return redirect()->to('/konsultasi');
                    }
                    if ($penyakit == $getGejalaById['id_penyakit']) {
                        $CFHE[] = $getGejalaById['cf_pakar'] * $reqCfUser[$i];
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
        $konsultasi = $this->konsultasiModel->getDataKonsul($idPasien);

        $data = [
            'title' => "hasil konsultasi",
            'subtitle' => "hasil konsultasi",
            'konsultasi' => $konsultasi
        ];

        return view('/konsul/hasil', $data);
    }
}
