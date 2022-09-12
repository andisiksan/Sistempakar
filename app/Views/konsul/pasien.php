<?= $this->extend('home/layout'); ?>

<?= $this->section('content'); ?>

<div class="wrapper main" id="main_utama">
    <div class="container main">
        <div class="row ">
            <div class="col-sm-5">
                <h4 class="text-white text-center font-weight-bold">Profile User</h4>
                <div class="card mb-3 shadow border-success">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url(); ?>/img/<?= $user['image']; ?>" class="img-fluid rounded-start" alt="profile user">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                <p class="card-text"><?= $user['email']; ?></p>
                                <p class="card-text text-muted"><?= $user['created_at']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-7">
                <?php if ($pasien) : ?>
                    <h4 class="text-white text-center font-weight-bold">Riwayat Konsultasi</h4>
                <?php endif; ?>
                <?php foreach ($pasien as $p) : ?>
                    <div class="mt-2 card p-2 shadow border-success">
                        <div class="card-body">
                            <p><?= $p['created_at']; ?></p>
                            <ul class="list-group">
                                <?php foreach ($p['konsultasi'] as $konsul) : ?>
                                    <li class="list-group-item border-success">
                                        <div class="row">
                                            <div class="col-8 text-capitalize"><?= $konsul['namaPenyakit']; ?></div>
                                            <div class="col-4 btn btn-success fw-bold"><?= $konsul['cfHasil']; ?> %</div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="<?= base_url(); ?>/konsultasi/<?= $p['id']; ?>" class="btn btn-warning btn-sm mt-2">Detail</a>
                            <a href="<?= base_url(); ?>/konsultasi/delete/<?= $p['id']; ?>" class="btn btn-danger btn-sm mt-2">Hapus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>