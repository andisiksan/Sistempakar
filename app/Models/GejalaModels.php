<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModels extends Model
{
    protected $table            = 'gejala';
    protected $primaryKey       = 'idGejala';
    protected $allowedFields    = ['idPenyakit', 'idGejala', 'namaGejala', 'role'];

    public function getGejala()
    {
        return $this
            ->join('penyakit', 'penyakit.idPenyakit  = gejala.idPenyakit')
            ->findAll();
    }


    public function editGejala($idGejala)
    {
        return $this
            ->where(['idGejala' => $idGejala])->first();
    }


    public function getGejalaByPenyakit($req)
    {
        $getPenyakit = [];
        foreach ($req as $key) {
            array_push($getPenyakit, $this->db->table('penyakit')->getWhere(['idPenyakit' => $key])->getRowArray());
        }

        for ($i = 0; $i < count($req); $i++) {
            foreach ($req as $key) {
                if ($getPenyakit[$i]['idPenyakit'] == $key) {
                    $getPenyakit[$i]['namaGejala'] = $this
                        ->Where(['idPenyakit' => $key])
                        ->findAll();
                }
            }
        }

        return $getPenyakit;
    }
}
