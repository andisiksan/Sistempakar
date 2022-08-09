<?php

namespace App\Models;

use CodeIgniter\Model;

class AturanModels extends Model
{
    protected $table = 'aturan';
    protected $primaryKey = 'id_aturan';
    protected $allowedFields = ['id_aturan', 'id_gejala', 'id_penyakit', 'id_makanan'];

    public function getAturan()
    {
        return $this
            ->join('penyakit', 'penyakit.id_penyakit  = aturan.id_penyakit')
            ->join('gejala', 'gejala.id_gejala  = aturan.id_gejala')
            ->join('makanan', 'makanan.id_makanan  = aturan.id_makanan')
            ->findAll();
    }
    // public function getGejala()
    // {
    //     return $this
    //         ->join('gejala', 'gejala.id_gejala  = aturan.id_gejala')
    //         ->findAll();
    // }


    // public function editGejala($id_gejala)
    // {
    //     return $this
    //         ->where(['id_gejala' => $id_gejala])->first();
    // }

    // public function selectgejala($penyakit = false)
    // {
    //     if ($penyakit == false) {
    //         return $this
    //             ->findAll();
    //     }
    //     return $this
    //         ->like('id_penyakit', $penyakit)
    //         ->findAll();
    // }
}
