<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container ">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/penyakit/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="id_penyakit" type="hidden" value="<?= $penyakit['id_penyakit']; ?>">
                    <div class="mb- mt-4">

                        <label for="input_gejala">Nama penyakit</label>
                        <input value="<?= $penyakit['nama_penyakit'] ?>" type="text" name="nama_penyakit" class="form-control" id="nama_penyakit">
                        <label for="input_gejala">Tentang penyakit</label>
                        <input value="<?= $penyakit['tentang_penyakit'] ?>" type="text" name="tentang_penyakit" class="form-control" id="tentang_penyakit">
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