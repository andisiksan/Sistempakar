<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container ">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/penyakit/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="idPenyakit" type="hidden" value="<?= $penyakit['idPenyakit']; ?>">
                    <div class="mb- mt-4">
                        <div class="form-group">
                            <label for="namaPenyakit">Nama penyakit</label>
                            <input value="<?= $penyakit['namaPenyakit'] ?>" type="text" name="namaPenyakit" class="form-control" id="namaPenyakit">
                        </div>
                        <div class="form-group">
                            <label for="detailPenyakit">Detail Penyakit</label>
                            <textarea class="form-control" id="detailPenyakit" rows="3" name="detailPenyakit"><?= $penyakit['detailPenyakit'] ?>"</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>