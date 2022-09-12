<?= $this->extend('auth/templateAuth'); ?>
<?= $this->section('content'); ?>

<div class="col-md-10 px-4">
    <div class="text-center">
        <h1 class="h4 font-weight-bold text-success mb-2">Register</h1>
    </div>
    <hr>
    <form class="admin" method="post" action="<?= base_url() ?>/auth/register">
        <?= csrf_field(); ?>
        <div class="form-group">
            <input type="text" value="<?= old('name'); ?>" class="form-control form-control-admin <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Full name">
            <div class="invalid-feedback ml-3">
                <?= $validation->getError('name'); ?>
            </div>
        </div>
        <div class="form-group">
            <input type="text" value="<?= old('email'); ?>" class="form-control form-control-admin <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address">
            <div class="invalid-feedback ml-3">
                <?= $validation->getError('email'); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-admin <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="password1" name="password1" placeholder="Password">
                <div class="invalid-feedback ml-3">
                    <?= $validation->getError('password1'); ?>
                </div>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-admin <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2" name="password2" placeholder="Repeat Password">
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-admin btn-block">
            Register Account
        </button>
    </form>
    <hr>
    <!-- <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
    <div class="text-center">
        <a class="small" href="/auth">Already have an account? Login!</a>
    </div>
</div>
</div>



<?= $this->endSection(); ?>