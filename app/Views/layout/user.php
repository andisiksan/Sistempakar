<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<!-- session pemberitahuan -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses !</strong> <?= session()->getFlashdata('pesan'); ?>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="user">
    <div class="card mt-3  shadow" style="max-width: 500px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text"><?= $user['email'] ?></p>
                    <?php $date = $user['created_at'];  ?>
                    <p class="card-text"><small class="text-muted">Dibuat pada <?= date('d F Y', strtotime($date)); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-dark text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($userAll as $u) : {
                    } ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= $u['name'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <?php if ($u["role_id"] == 2) : ?>
                            <td>Admin</td>
                            <td><button type="button" class="btn btn-secondary" disabled>Jadikan Admin</button></td>
                        <?php else : ?>
                            <td>User</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modal<?= $u['id'] ?>" type="button" class="btn btn-success">Jadikan Admin</a>
                                <!-- Modal -->
                                <div class="modal fade" id="modal<?= $u['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Apakah Anda Yakin Ingin Menjadikan <?= $u['name'] ?> Sebagai Admin ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

                                                <form action="<?= base_url(); ?>/user/update" method="POST" enctype="multipart/form-data">
                                                    <?= csrf_field(); ?>
                                                    <input name="id" type="hidden" value="<?= $u['id']; ?>">
                                                    <button type="submit" class="btn btn-success">Ya</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection(); ?>