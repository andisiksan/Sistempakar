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

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1;
                foreach ($userAll as $u) : {
                    } ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $u['name'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td>
                            <a href="<?= base_url(); ?>/user/detail/<?= $u['id'] ?>" type="button" class="btn btn-warning">Detail User</a>
                        </td>                    
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<?= $this->endSection(); ?>