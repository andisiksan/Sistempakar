<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>


<!-- Content Row -->
<div class="row">



    <!-- penyakit -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-danger text-uppercase mb-1">
                            Total Penyakit</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penyakit ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-lungs-virus fa-4x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- gejala-->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Total Gejala</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $gejala; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-bacteria fa-4x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- makanan-->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                            Total Makanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $makanan ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-bowl-rice fa-4x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Pasien -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                            Total Pasien</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $pasien; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-flask fa-4x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-5">
        <img src="<?= base_url() ?>/img/gambar_1.png" alt="">
    </div>
    <div class="col-md-12 col-lg-7">
        <h2 class="font-weight-bold text-success text-uppercase mt-4">Rekomendasi Larangan Makanan berdasarkan JEnis
            penyakit menggunakan metode certainty factor & forward chaining</h2>
    </div>
</div>
<?= $this->endSection(); ?>