<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/makanan/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="idMakanan" type="hidden" value="<?= $makanan['idMakanan']; ?>">
                    <div class="mt-4">
                        <label for="namaMakanan">Nama penyakit</label>
                        <input value="<?= $makanan['namaMakanan'] ?>" type="text" name="namaMakanan" class="form-control" id="namaMakanan">

                        <!-- detail -->
                        <div class="form-group">
                            <label for="detailMakanan">Detail Makanan</label>
                            <textarea class="form-control" id="detailMakanan" rows="3" name="detailMakanan"><?= $makanan['detailMakanan'] ?>"</textarea>
                        </div>

                        <!-- penyakit -->
                        <div class="form-group">
                            <label for="penyakit" class="form-label">penyakit</label>
                            <select name="penyakit" class="form-control" id="penyakit">
                                <?php foreach ($penyakit as $k) : ?>
                                    <option value="<?= $k['idPenyakit']; ?>"><?= $k['namaPenyakit']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- status -->
                        <div class="form-group">
                            <label for="status" class="form-label">status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="rekomendasi">Rekomendasi</option>
                                <option value="larangan">Larangan</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>