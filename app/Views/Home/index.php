<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>

<div class="wrapper main" id="main_utama">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div id="carouselStandar" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url() ?>/img/gambar_1.png" alt="" width="100%" id="foto">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url() ?>/img/gambar2.jpg" alt="" width="100%" id="foto">
                            <!-- <img src="dk3.png" class="d-block w-100" alt="gambar"> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7">
                <h2 class="font-weight-bold text-white text-uppercase mt-4">Rekomendasi Larangan Makanan berdasarkan JEnis
                    penyakit menggunakan metode forward chaining & certainty factor </h2>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="<?= base_url('/konsultasi'); ?>" class="btn btn-success button1">
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