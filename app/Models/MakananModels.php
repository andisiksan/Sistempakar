<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModels extends Model
{
    protected $table = 'makanan';
    // protected $useTimestamps = true;
    protected $primaryKey = 'idMakanan';
    protected $allowedFields = ['idMakanan', 'idPenyakit', 'namaMakanan', 'detailMakanan', 'status'];

    public function editMakanan($idMakanan)
    {
        return $this
            ->join('penyakit', 'penyakit.idPenyakit  = makanan.idPenyakit')
            ->where(['idMakanan' => $idMakanan])->first();
    }

    public function getPenyakit()
    {
        return $this
            ->join('penyakit', 'penyakit.idPenyakit  = makanan.idPenyakit')
            ->findAll();
    }
}
