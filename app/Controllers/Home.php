<?php

namespace App\Controllers;

use App\Models\GejalaModels;
use App\Models\PenyakitModels;
use App\Models\UserModels;
use App\Models\MakananModels;

class Home extends BaseController
{
    public function __construct()
    {
        $this->gejalaModels = new GejalaModels();
        $this->penyakitModels = new PenyakitModels();
        $this->usermodels = new UserModels();
        $this->makananModels = new MakananModels();
    }

    public function index()
    {
        // $admin = $this->adminModel->where(['email' => session()->get('email')])->first();
        $penyakit = $this->penyakitModels->findAll();
        $data = [
            'title' => '',
            // 'admin' => $admin,
            'var' => 'admin',
            'penyakit' => $penyakit,
        ];
        return view('Home/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Me',
            // 'admin' => $admin,
        ];
        return view('Home/about', $data);
    }

    // public function diagnosa()
    // {
    //     // $admin = $this->usermodels->findAll();
    //     $penyakit = $this->penyakitModels->findAll();


    //     if (session()->get('email') == null) {
    //         session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">anda harus login terlebih dahulu');
    //         return redirect()->to('/auth');
    //     } else {
    //         $data = [
    //             'title' => 'Diagnosa',
    //             'subtitle' => 'PIlih penyakit terlebih dahulu',
    //             'penyakit' => $penyakit,
    //             // 'judul_penyakit' => $this->gejalaModels->getGejala(),
    //         ];
    //         // return redirect()->to('/Home/diagnosa', $data);
    //         return view('Home/diagnosa', $data);
    //     }
    // }



    // public function hasilDiagnosa()
    // {

    //     // $gejalakey = $this->request->getPost('gejalakeyword');
    //     // $str = implode(",", $gejalakey);
    //     // var_dump($str)


    //     $str = $this->request->getVar('gejalakeyword');
    //     $penyakit = $this->request->getVar('penyakitkeyword');
    //     $gejala_admin = $this->gejalaModels->selectpenyakit($penyakit);
    //     // $gejalakey =
    //     // implode(",", $str);
    //     // var_dump($str);
    //     $d = [];
    //     $a = [];
    //     $result = [];
    //     foreach ($gejala_admin as $b) {
    //         array_push($a, $b['cf_pakar']);
    //     }
    //     foreach ($str as $item) {
    //         array_push($d, $item);
    //     }
    //     foreach ($d as $da) {
    //         $i = 0;

    //         array_push($result, $da * $a[$i]);
    //         $i++;
    //     }
    //     for ($i = 0; $i < count($result); $i++) {
    //         $b = $result[$i];
    //         if (isset($result[$i + 1])) {
    //             $c = $result[$i + 1];
    //             $hasil = $b + $c * (1 - $b);
    //             $result[$i + 1] = $hasil;
    //         }
    //         $hasil_akhir = $result[$i] * 100;
    //     }

    //     $user = $this->usermodels->where(['email' => session()->get('email')])->first();
    //     $makanan = $this->makananModels->where(['id_penyakit' => $penyakit])->first();
    //     echo "hasil akhir :" . round($hasil_akhir, 2) . "%<br>";
    //     echo "id User : " . $user['id'] . "<br>";
    //     if ($makanan) {
    //         echo "Makanan : " . $makanan['nama_makanan'] . "<br>";
    //     }
    //     echo $penyakit;
    //     die;


    //     // if ($str) {
    //     //     $gejala = $this->gejalaModels->editGejala($gejalakey);
    //     // } else {
    //     //     $gejala = $this->gejalaModels->editGejala();
    //     // }

    //     $data = [
    //         'title' => 'Hasil Diagnosa',
    //         'subtitle' => 'Hasil ini berdasarkan inputan user kemudian diproses dengan metode certainty factor',
    //     ];
    //     return view('Home/hasildiagnosa', $data);













    //     // Rumus Certainty Factor
    //     // hasil[] = gejala.cf_pakar*gejala_user.cf_user -> hasil[0.34,0.56,0.40]
    //     // combine=hasil[index_sebelum]+hasil[index_sesudah]*(1-hasil[index_sebelum]) -> 0.82576 * 100
    //     // hasil_akhir = combine*100

    //     // $users = [];
    //     // foreach ($this->request->getPost() as $i) {
    //     //     array_push($users, $i);
    //     // }
    //     // print_r($users);

    //     // return view('Home/hasildiagnosa', $data);
    // }


    // public function dataGejala()
    // {
    //     $keyword = $this->request->getVar('id');
    //     if ($keyword) {
    //         $gejala = $this->gejalaModels->selectpenyakit($keyword);
    //     } else {
    //         $gejala = $this->gejalaModels->selectpenyakit();
    //     }

    //     $output = "";
    //     foreach ($gejala as $i) {
    //         $output .= '<tr>
    //                 <td>' . $i['input_gejala'] . '</td>
    //                 <td>
    //                     <div class="form-check form-check-inline">
    //                         <input class="form-check-input" type="radio" name="gejalakeyword[' . $i['id_gejala'] . ']" id="inlineRadio1" value="0">
    //                         <label class="form-check-label" for="inlineRadio1">Tidak</label>
    //                     </div>
    //                     <div class="form-check form-check-inline">
    //                         <input class="form-check-input" type="radio" name="gejalakeyword[' . $i['id_gejala'] . ']" id="inlineRadio1" value="0.2">
    //                         <label class="form-check-label" for="inlineRadio1">Mungkin</label>
    //                     </div>
    //                     <div class="form-check form-check-inline">
    //                         <input class="form-check-input" type="radio" name="gejalakeyword[' . $i['id_gejala'] . ']" id="inlineRadio1" value="0.4">
    //                         <label class="form-check-label" for="inlineRadio1">Sedikit Yakin</label>
    //                     </div>
    //                     <div class="form-check form-check-inline">
    //                         <input class="form-check-input" type="radio" name="gejalakeyword[' . $i['id_gejala'] . ']" id="inlineRadio1" value="0.6">
    //                         <label class="form-check-label" for="inlineRadio1">Cukup Yakin</label>
    //                     </div>
    //                     <div class="form-check form-check-inline">
    //                         <input class="form-check-input" type="radio" name="gejalakeyword[' . $i['id_gejala'] . ']" id="inlineRadio1" value="0.8">
    //                         <label class="form-check-label" for="inlineRadio1">Yakin</label>
    //                     </div>
    //                     <div class="form-check form-check-inline" >
    //                         <input class="form-check-input" type="radio" name="gejalakeyword[' . $i['id_gejala'] . ']" id="inlineRadio1" value="1">
    //                         <label class="form-check-label" for="inlineRadio1">Sangat Yakin</label>
    //                     </div>
    //                 </td>
    //                 </tr>';
    //     }
    //     return json_encode($output);
    // }
}
