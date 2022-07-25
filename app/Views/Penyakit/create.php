<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8 mb-4">
                <form action="<?= base_url(); ?>/penyakit/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <label for="nama_penyakit">Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" class="form-control" id="nama_penyakit">
                    <label for="tentang_penyakit">Tentang Penyakit</label>
                    <input type="text" name="tentang_penyakit" class="form-control" id="tentang_penyakit">

                    <!-- <div class="form-group">
                        <label for="kategori" class="form-label">Penyakit</label>
                        <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                            <option value=""> </option>
                        </select>
                    </div> -->
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>