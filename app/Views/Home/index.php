<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>

<section id="banner">
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url() ?>/img/hero2.png" class="ban-img img-fluid" alt="">
                </div>
                <div class="col-md-6" id="caption">
                    <h2 class="title font-weight-bold text-white text-uppercase ">RANCANG BANGUN APLIKASI</h2>
                    <h5 class="font-weight-bold text-capitalize">REKOMENDASI DAN LARANGAN MAKANAN BERDASARKAN JENIS PENYAKIT MENGGUNAKAN METODE CERTAINTY FACTOR DAN FORWARD CHAINING </h5>
                    <a href="<?= base_url('/konsultasi'); ?>" class="btn btn-success button1 mt-4">
                        <i class="fa fa-play"></i> Konsultasi
                    </a>
                </div>
            </div>
        </div>
    </div>
    <img src="<?= base_url() ?>/img/wave4.svg" class="wave" alt="">
</section>

<?= $this->endSection(); ?>