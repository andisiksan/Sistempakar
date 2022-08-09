<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8 mb-4">
                <form action="<?= base_url(); ?>/aturan/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="form-group">
                        <label for="penyakit" class="form-label">Pilih Penyakit</label>
                        <select name="penyakit" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($penyakit as $p) : ?>
                                <option value="<?= $p['id_penyakit']; ?>"><?= $p['nama_penyakit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gejala" class="form-label">Pilih Gejala</label>
                        <select name="gejala" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($gejala as $p) : ?>
                                <option value="<?= $p['id_gejala']; ?>"><?= $p['input_gejala']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="makanan" class="form-label">Pilih Makanan</label>
                        <select name="makanan" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($makanan as $p) : ?>
                                <option value="<?= $p['id_makanan']; ?>"><?= $p['nama_makanan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>