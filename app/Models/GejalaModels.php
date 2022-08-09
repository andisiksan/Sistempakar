<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModels extends Model
{
    protected $table = 'gejala';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_gejala';
    protected $allowedFields = ['input_gejala', 'id_penyakit', 'cf_pakar'];

    public function getGejala()
    {
        return $this
            ->join('penyakit', 'penyakit.id_penyakit  = gejala.id_penyakit')
            ->findAll();
    }

    public function editGejala($id_gejala)
    {
        return $this
            ->where(['id_gejala' => $id_gejala])->first();
    }

    public function selectpenyakit($penyakit = false)
    {
        if ($penyakit == false) {
            return $this
                ->findAll();
        }
        return $this
            ->like('id_penyakit', $penyakit)
            ->findAll();
    }
}
