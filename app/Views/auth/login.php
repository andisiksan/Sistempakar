<?= $this->extend('auth/templateAuth'); ?>

<?= $this->section('content'); ?>
<div class="col-md-6 px-4">
    <!-- <div>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        <?php endif; ?>
    </div> -->
    <div class="text-center">
        <h1 class="h4 font-weight-bold text-success mb-2">Login</h1>
    </div>
    <hr>

    <form class="admin" method="post" action="<?= base_url() ?>/auth/login">
        <div class="form-group">
            <input type="text" value="<?= old('email'); ?>" name="email" class="form-control form-control-admin <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" placeholder="Enter Email Address...">
            <div class="invalid-feedback ml-3">
                <?= $validation->getError('email'); ?>
            </div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-admin <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Password">
            <div class="invalid-feedback ml-3">
                <?= $validation->getError('password'); ?>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-admin btn-block">
            Login
        </button>

    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="/auth/registration">New Account</a>
    </div>

</div>
</div>

<?= $this->endSection(); ?>