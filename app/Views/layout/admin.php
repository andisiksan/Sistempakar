<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>


<div class="card-header py-3">
    <a href="/auth/registration" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Admin</span>
    </a>
</div>
<div class="admin">
    <div class="card mt-3  shadow" style="max-width: 500px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $admin['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $admin['name'] ?></h5>
                    <p class="card-text"><?= $admin['email'] ?></p>
                    <?php $date = $admin['created_at'];  ?>
                    <p class="card-text"><small class="text-muted">Dibuat pada <?= date('d F Y', strtotime($date)); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>