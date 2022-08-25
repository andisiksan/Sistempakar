<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8 mb-4">
                <form action="<?= base_url(); ?>/gejala/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <label for="namaGejala">Masukkan Gejala</label>
                    <input type="text" name="namaGejala" class="form-control" id="namaGejala">

                    <div class="form-group">
                        <label for="role" class="form-label">Cf Pakar</label>
                        <select name="role" class="form-control" id="role">
                            <?php foreach ($bobot as $b) : ?>
                                <option value="<?= $b['nilai']; ?>"><?= $b['ket']; ?> (<?= $b['nilai']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="penyakit" class="form-label">Penyakit</label>
                        <select name="penyakit" class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($penyakit as $p) : ?>
                                <option value="<?= $p['idPenyakit']; ?>"><?= $p['namaPenyakit']; ?></option>
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