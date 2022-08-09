<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8 mb-4">
                <form action="<?= base_url(); ?>/gejala/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <label for="input_gejala">Masukkan Gejala</label>
                    <input type="text" name="input_gejala" class="form-control" id="input_gejala">
                    <label for="cf_pakar">Masukkan Cf Pakar</label>
                    <input type="text" name="cf_pakar" class="form-control" id="cf_pakar">

                    <div class="form-group">
                        <label for="penyakit" class="form-label">Penyakit</label>
                        <select name="penyakit" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($penyakit as $p) : ?>
                                <option value="<?= $p['id_penyakit']; ?>"><?= $p['nama_penyakit']; ?></option>
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