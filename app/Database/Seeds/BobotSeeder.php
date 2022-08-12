<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BobotSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                "ket" => "Tidak",
                "nilai" => 0,
                "role" => "user"
            ],
            [
                "ket" => "Tidak Tahu",
                "nilai" => 0.2,
                "role" => "user"
            ],
            [
                "ket" => "Sedikit Yakin",
                "nilai" => 0.4,
                "role" => "user"
            ],
            [
                "ket" => "Cukup Yakin",
                "nilai" => 0.6,
                "role" => "user"
            ],
            [
                "ket" => "Yakin",
                "nilai" => 0.8,
                "role" => "user"
            ],
            [
                "ket" => "Sangat Yakin",
                "nilai" => 1,
                "role" => "user"
            ],
            [
                "ket" => "Tidak Tahu",
                "nilai" => 0,
                "role" => "admin"
            ],
            [
                "ket" => "Mungkin",
                "nilai" => 0.4,
                "role" => "admin"
            ],
            [
                "ket" => "Kemungkinan Besar",
                "nilai" => 0.6,
                "role" => "admin"
            ],
            [
                "ket" => "Hampir Pasti",
                "nilai" => 0.8,
                "role" => "admin"
            ],
            [
                "ket" => "Pasti",
                "nilai" => 1,
                "role" => "admin"
            ]

        ];

        // Using Query Builder
        $this->db->table('bobot')->insertBatch($data);
    }
}
