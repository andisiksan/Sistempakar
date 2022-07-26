<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>


<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses !</strong> <?= session()->getFlashdata('pesan'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="card-header py-3">
    <a href="/makanan/create" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Makanan</span>
    </a>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-dark" id="table-makanan" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Makanan</th>
                    <th>Detail Makanan</th>
                    <th>Penyakit</th>
                    <th>Status</th>
                    <th>aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($makanan as $m) :
                ?>

                    <tr>
                        <th><?= $no++; ?></th>
                        <td><?= $m['namaMakanan']; ?></td>
                        <td><?= $m['detailMakanan']; ?></td>
                        <td><?= $m['namaPenyakit']; ?></td>
                        <td><?= $m['status']; ?></td>

                        <td class="col-2">
                            <!-- edit -->
                            <a href="<?= base_url(); ?>/makanan/edit/<?= $m['idMakanan'] ?>" type="button" class="btn btn-warning">Edit</a>

                            <!-- hapus -->
                            <a href="" data-toggle="modal" data-target="#modal<?= $m['idMakanan'] ?>" type="button" class="btn btn-danger">Hapus</a>
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?= $m['idMakanan'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Yakin Ingin Menghapus <?= $m['namaMakanan'] ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="<?= base_url(); ?>/makanan/delete/<?= $m['idMakanan']; ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="_method" value="">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>


                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts') ?>

<script>
    $('#table-makanan').DataTable({
        'paging': true,
        'columnDefs': [{
            'searchable': false,
            'targets': [0, 5]
        }, ]
    });
</script>

<?= $this->endSection(); ?>