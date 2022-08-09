<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>


<div class="wrapper main" id="main_utama">
    <div class="container ">

        <div class="row">
            <div class="col-lg-4">
                <div class="card1 mb-5 ">
                    <div class="card_judul">
                        <h5 class="header-text text-white">Persentase Penyakit</h5>
                    </div>
                    <table border="1">
                        <tr>
                            <th>Nama gejala yang dipilih</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <?php foreach ($gejala as $g) : ?>
                                    <?= $g['id_gejala']; ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card1">
                    <form action="" method="POST">
                        <div class="card_judul">
                            <h5 class="header-text text-white">Rekomendasi & Larangan</h5>
                        </div>
                        <p>Rekomendasi</p>
                        <ul>

                        </ul>
                        <p>Larangan</p>
                        <ul>
                            <li>okokok</li>
                            <li>okokok</li>
                            <li>okokok</li>
                            <li>okokok</li>
                            <li>okokok</li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>