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

            </ul>
            <?php foreach ($makanan as $konsul) : ?>
                <div class="card mb-4  border-success">
                    <div class="card-header h5 text-capitalize">
                        <?= $konsul['nama_makanan']; ?>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"> <?= $konsul['nama_makanan']; ?></th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>