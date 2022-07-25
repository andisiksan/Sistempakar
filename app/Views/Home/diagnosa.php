<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>

<div class="wrapper main" id="main_utama">
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Penyakit
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach ($penyakit as $p) : ?>
                            <a class="dropdown-item" href="#"><?= $p['nama_penyakit'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form action="<?= base_url('home/hasilDiaganosa'); ?>" method="POST">
                    <h4 class="header-text text-white">Pilih Gejala</h4>
                    <div class="boxes text-white main">
                        <table>
                            <?php foreach ($gejala as $g) : ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="<?= $g['id_gejala']; ?>" name="id_gejala[]" value="<?= $g['id_gejala']; ?>">
                                    </td>
                                    <td colspan="2">
                                        <?= $g['input_gejala']; ?> | Apakah <?= $g['input_gejala']; ?> ?
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <div class="button mt-4">
                            <button type="submit" class="btn btn-dark">Lihat Hasil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<?= $this->endSection(); ?>