<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>

<div class="wrapper main" id="main_utama">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <img src="<?= base_url() ?>/img/gambar_1.png" alt="" width="100%" id="foto">
            </div>
            <div class="col-md-12 col-lg-7">
                <h2 class="font-weight-bold text-white text-uppercase mt-4">Rekomendasi Larangan Makanan berdasarkan JEnis
                    penyakit menggunakan metode forward chaining & certainty factor </h2>
                <div class="mt-4">
                    <!-- <a href="<?= base_url('/home/diagnosa'); ?>" class="btn btn-dark btn-neutral">
                        <i class="fa fa-play"></i> Mulai Diagnosa
                    </a> -->

                    <div class="row">
                        <!-- <div class="col-6">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilih Penyakit
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php foreach ($penyakit as $p) : ?>
                                        <li class="dropdown-item">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"><?= $p['nama_penyakit'] ?>
                                                </label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                    <button class="text-center" type="submit">cari</button> -->
                        <!-- <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a> -->
                        <!-- </div>
                            </div>

                        </div> -->
                        <div class="col-6">
                            <a href="<?= base_url('/auth'); ?>" class="btn btn-dark btn-neutral">
                                <i class="fa fa-play"></i> Konsultasi
                            </a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>