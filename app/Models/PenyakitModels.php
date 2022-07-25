<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModels extends Model
{
    protected $table = 'penyakit';
    // protected $useTimestamps = true;
    protected $primaryKey = 'id_penyakit';
    protected $allowedFields = ['id_penyakit', 'nama_penyakit', 'tentang_penyakit'];

    public function editPenyakit($id_penyakit)
    {
        return $this
            ->where(['id_penyakit' => $id_penyakit])->first();
    }
}
