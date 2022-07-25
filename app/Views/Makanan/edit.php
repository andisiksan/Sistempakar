<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mt-4">
    <div class="container mt-4">
        <div class=" row">
            <div class="col-8">
                <form action="<?= base_url(); ?>/makanan/update" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input name="id_makanan" type="hidden" value="<?= $makanan['id_makanan']; ?>">
                    <div class="mb- mt-4">
                        <label for="nama_makanan">Nama penyakit</label>
                        <input value="<?= $makanan['nama_makanan'] ?>" type="text" name="nama_makanan" class="form-control" id="nama_makanan">
                        <label for="detail_makanan">Detail makanan</label>
                        <input value="<?= $makanan['detail_makanan'] ?>" type="text" name="detail_makanan" class="form-control" id="detail_makanan">
                        <label for="status">Status</label>
                        <input value="<?= $makanan['status'] ?>" type="text" name="status" class="form-control" id="status">
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