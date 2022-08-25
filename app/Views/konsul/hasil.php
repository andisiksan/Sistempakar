<?= $this->extend('home/layout'); ?>

<?= $this->section('content') ?>

<div class="container my-4">
    <div class="card shadow  ">
        <div class="card-header">

            <a href="<?= base_url(); ?>/users/<?= session()->get('email'); ?>" class="btn btn-outline-secondary">Selesai</a>
            <a href="" class="btn btn-outline-danger">Export Pdf</a>
        </div>
        <div class="card-body px-4 py-4">
            <h3 class="text-center">Selesai Konsultasi</h3>
            <hr>
            <p class="fs-5 text">Anda Didiagnosis Kemungkinan Mengalami Penyakit : </p>
            <ul class="list-group " style="max-width: 500px; margin-bottom: 30px;">
                <?php foreach ($konsultasi as $konsul) : ?>

                    <li class="list-group-item border-success">
                        <div class="row">
                            <div class="col-8 h5 text-capitalize"><?= $konsul['namaPenyakit']; ?></div>
                            <div class="col-4 btn btn-success fw-bold"><?= $konsul['cfHasil']; ?> %</div>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>
            <?php foreach ($konsultasi as $konsul) : ?>
                <div class="card mb-4  border-success">
                    <div class="card-header h5 text-capitalize">
                        <?= $konsul['namaPenyakit']; ?>
                    </div>
                    <div class="card-body">

                        <table class="table">
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
                                foreach ($konsul['dataCf'] as $cf) : ?>
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
            <?php endforeach; ?>

        </div>
        <!-- Button trigger modal -->
        <table>
            <tr>
                <td class="text-center">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#rekomendasi">
                        Rekomendasi Makanan
                    </button>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#larangan">
                        Larangan Makanan
                    </button>
                </td>
            </tr>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="rekomendasi" tabindex="-1" aria-labelledby="rekomendasiLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white text-center">
                        <h5 class="modal-title" id="rekomendasiLabel">Rekomendasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-4  border-primary">
                            <table class="table">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama makanan</th>
                                    <th>Detail Makanan</th>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modallarangan -->
        <div class="modal fade" id="larangan" tabindex="-1" aria-labelledby="laranganLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="laranganLabel">larangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-4 border-danger">
                            <table class="table">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama makanan</th>
                                    <th>Detail Makanan</th>
                                </tr>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>