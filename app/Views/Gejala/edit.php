<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/gejala/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="idGejala" type="hidden" value="<?= $gejala['idGejala']; ?>">
                    <div class="mb- mt-4">
                        <label for="namaGejala">Edit Gejala</label>
                        <input value="<?= $gejala['namaGejala'] ?>" type="text" name="namaGejala" class="form-control" id="namaGejala">
                        <div class="form-group">
                            <label for="bobot" class="form-label">bobot</label>
                            <select name="bobot" class="form-control" id="bobot">
                                <?php foreach ($bobot as $b) : ?>
                                    <option <?= $gejala['role'] == $b['nilai'] ? "selected" : "" ?> value="<?= $b['nilai']; ?>"><?= $b['ket'] ?> (<?= $b['nilai'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="penyakit" class="form-label">Penyakit</label>
                            <select name="penyakit" class="form-control" id="penyakit">
                                <?php foreach ($penyakit as $p) : ?>
                                    <option <?= $gejala['idPenyakit'] == $p['idPenyakit'] ? "selected" : "" ?> value="<?= $p['idPenyakit']; ?>"><?= $p['namaPenyakit']; ?></option>
                                <?php endforeach; ?>
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