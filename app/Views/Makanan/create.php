<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8 mb-4">
                <form action="<?= base_url(); ?>/makanan/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <label for="namaMakanan">Nama makanan</label>
                    <input type="text" name="namaMakanan" class="form-control" id="namaMakanan">
                    <div class="form-group">
                        <label for="detailMakanan">Detail Makanan</label>
                        <textarea class="form-control" id="detailMakanan" rows="3" name="detailMakanan"></textarea>
                    </div>
                    <!-- <label for="status">Status makanan</label>
                    <input type="text" name="status" class="form-control" id="status"> -->
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

                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>