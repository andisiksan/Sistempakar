<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table            = 'gejala';
    protected $primaryKey       = 'id_gejala';
    protected $allowedFields    = ['id_penyakit', 'id_gejala', 'input_gejala', 'cf_pakar'];


    public function getGejalaByPenyakit($req)
    {
        $getPenyakit = [];
        foreach ($req as $key) {
            array_push($getPenyakit, $this->db->table('penyakit')->getWhere(['id_penyakit' => $key])->getRowArray());
        }

        for ($i = 0; $i < count($req); $i++) {
            foreach ($req as $key) {
                if ($getPenyakit[$i]['id_penyakit'] == $key) {
                    $getPenyakit[$i]['input_gejala'] = $this
                        ->Where(['id_penyakit' => $key])
                        ->findAll();
                }
            }
        }

        return $getPenyakit;
    }
}
