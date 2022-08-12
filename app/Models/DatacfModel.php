<?php

namespace App\Models;

use CodeIgniter\Model;

class DatacfModel extends Model
{
    protected $table            = 'datacf';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['idKonsultasi', 'idGejala', 'cfUser', 'ket'];
}
