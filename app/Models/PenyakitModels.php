<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModels extends Model
{
    protected $table = 'penyakit';
    // protected $useTimestamps = true;
    protected $primaryKey = 'idPenyakit';
    protected $allowedFields = ['idPenyakit', 'namaPenyakit', 'detailPenyakit'];

    public function editPenyakit($idPenyakit)
    {
        return $this
            ->where(['idPenyakit' => $idPenyakit])->first();
    }
}
