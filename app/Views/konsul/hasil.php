<?= $this->extend('home/layout'); ?>

<?= $this->section('content') ?>

<div class="container my-4">
    <div class="card shadow  ">
        <div class="card-header">
            <!-- <a href="<?= base_url(); ?>/home/pasien" class="btn btn-outline-secondary">Selesai</a> -->
            <a href="<?= base_url(); ?>/home/" class="btn btn-outline-secondary">Selesai</a>

            <!-- <a href="" class="btn btn-outline-danger">Export Pdf</a> -->
        </div>
        <div class="card-body px-4 py-4">

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p class="fs-5 text">Hasil Persentase Berdasarkan Gejala Yang dipilih </p>
                    <ul class="list-group " style="max-width: 500px; margin-bottom: 30px;">
                        <?php foreach ($konsultasis as $ko) : ?>
                            <li class="list-group-item border-success">
                                <div class="row">
                                    <div class="col-8 h5 text-capitalize"><?= $ko['namaPenyakit']; ?></div>
                                    <div class="col-4 btn btn-success fw-bold"><?= $ko['cfHasil']; ?> %</div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12">
                    <p class="fs-5 text">Anda Didiagnosis Kemungkinan Mengalami Penyakit : </p>
                    <ul class="list-group " style="max-width: 500px; margin-bottom: 30px;">
                        <li class="list-group-item border-success">
                            <div class="row">
                                <div class="col-8 h5 text-capitalize"><?= $konsultasi['namaPenyakit']; ?></div>
                                <div class="col-4 btn btn-success fw-bold"><?= $konsultasi['cfHasil']; ?> %</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php if (session()->get('role_id') == 2) : ?>
                <?php foreach ($konsultasis as $ko) : ?>
                    <div class="card mb-4  border-success">
                        <div class="card-header h5 text-capitalize">
                            <?= $ko['namaPenyakit']; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Gejala</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($ko['dataCf'] as $cf) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $cf['namaGejala']; ?></td>
                                                <td><?= $cf['ket']; ?></td>
                                                <td><?= $cf['cfUser']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>


            <div class="card mb-4  border-primary">
                <div class="card-header bg-primary text-white h5 text-capitalize text-center">
                    Rekomendasi
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <th>No</th>
                                <th>Nama makanan</th>
                                <th>Detail Makanan</th>
                            </thead>
                            </tr>
                            <?php $i = 1;
                            foreach ($rekomendasi as $r) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $r['namaMakanan'] ?></td>
                                    <td><?= $r['detailMakanan'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>




            <div class="card mb-4 border-danger">
                <div class="card-header bg-danger text-white h5 text-capitalize text-center">
                    Larangan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama makanan</th>
                                    <th>Detail Makanan</th>
                                </tr>
                            </thead>
                            <?php $i = 1;
                            foreach ($larangan as $l) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $l['namaMakanan'] ?></td>
                                    <td><?= $l['detailMakanan'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>