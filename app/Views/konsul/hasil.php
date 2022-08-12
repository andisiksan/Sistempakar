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
                            <div class="col-8 h5 text-capitalize"><?= $konsul['nama_penyakit']; ?></div>
                            <div class="col-4 btn btn-success fw-bold"><?= $konsul['cfHasil']; ?> %</div>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>
            <?php foreach ($konsultasi as $konsul) : ?>
                <div class="card mb-4  border-success">
                    <div class="card-header h5 text-capitalize">
                        <?= $konsul['nama_penyakit']; ?>
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
                                        <td><?= $cf['input_gejala']; ?></td>
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
    </div>
</div>

<?= $this->endSection() ?>