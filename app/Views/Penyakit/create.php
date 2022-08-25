<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8 mb-4">
                <form action="<?= base_url(); ?>/penyakit/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="namaPenyakit">Nama Penyakit</label>
                        <input type="text" name="namaPenyakit" class="form-control" id="namaPenyakit">
                    </div>

                    <div class="form-group mt-2">
                        <label for="detailPenyakit">Tentang Penyakit</label>
                        <input type="text" name="detailPenyakit" class="form-control" id="detailPenyakit">
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>