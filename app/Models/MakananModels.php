<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModels extends Model
{
    protected $table = 'makanan';
    // protected $useTimestamps = true;
    protected $primaryKey = 'id_makanan';
    protected $allowedFields = ['id_makanan', 'id_penyakit', 'nama_makanan', 'detail_makanan', 'status'];

    public function editMakanan($id_makanan)
    {
        return $this
            ->where(['id_makanan' => $id_makanan])->first();
    }
}
