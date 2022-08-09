<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/gejala/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="id_gejala" type="hidden" value="<?= $gejala['id_gejala']; ?>">
                    <div class="mb- mt-4">
                        <label for="input_gejala">Ubah Gejala</label>
                        <input value="<?= $gejala['input_gejala'] ?>" type="text" name="input_gejala" class="form-control" id="input_gejala">
                    </div>
                    <!-- <div class="form-group">
                        <label for="kategori" class="form-label">Penyakit</label>
                        <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                            <option value=""> </option>
                        </select>
                    </div> -->
                    <button type="submit" class="btn btn-success mt-3 mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>