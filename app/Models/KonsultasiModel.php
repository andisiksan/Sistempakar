<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{

    protected $table            = 'konsultasi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['idPasien', 'cfHasil', 'idPenyakit'];


    public function getKonsul($idPasien)
    {
        return $this
            ->join('penyakit', 'penyakit.idPenyakit=konsultasi.idPenyakit')
            ->select('konsultasi.id, idPasien, cfHasil, namaPenyakit')
            ->where(['idPasien' => $idPasien])->findAll();
    }

    public function getDataKonsul($idPasien)
    {
        $konsultasi = $this
            ->join('penyakit', 'penyakit.idPenyakit=konsultasi.idPenyakit')
            ->select('konsultasi.id, idPasien, cfHasil, konsultasi.idPenyakit, namaPenyakit')
            ->where(['idPasien' => $idPasien])
            ->findAll();


        for ($i = 0; $i < count($konsultasi); $i++) {
            $konsultasi[$i]['dataCf'] = $this
                ->db->table('datacf')
                ->join('gejala', 'gejala.idGejala=datacf.idGejala')
                ->where(['idKonsultasi' => $konsultasi[$i]['id']])
                ->get()->getResultArray();
        }

        return $konsultasi;
    }
    public function getDataKonsulTertinggi($idPasien)
    {
        $konsultasi = $this
            ->join('penyakit', 'penyakit.idPenyakit=konsultasi.idPenyakit')
            ->select('konsultasi.id, idPasien, cfHasil, konsultasi.idPenyakit, namaPenyakit, level')
            ->where(['idPasien' => $idPasien])
            ->findAll();


        for ($i = 0; $i < count($konsultasi); $i++) {
            $konsultasi[$i]['dataCf'] = $this
                ->db->table('datacf')
                ->join('gejala', 'gejala.idGejala=datacf.idGejala')
                ->where(['idKonsultasi' => $konsultasi[$i]['id']])
                ->get()->getResultArray();
        }

        return $konsultasi;
    }
}
