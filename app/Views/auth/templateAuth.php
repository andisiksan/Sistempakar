<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/gambar_1.png">

    <title><?= $title; ?></title>
    <!-- Custom fonts for this template-->
    <link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>/template/css/style.css">

</head>

<body id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6" id="backgroundauth">
                <div class="row vh-100 d-flex align-items-center justify-content-center">
                    <img src="<?= base_url(); ?>/img/gambar_1.png" class="d-flex align-items-center">
                </div>
            </div>
            <div class="col-md-6 col-lg-6" id="backgroundright">
                <div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <?= session()->getFlashdata('pesan'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <?php endif; ?>
                </div>
                <div class="row vh-50 d-flex align-items-center justify-content-center bg-light" id="backgroundrightbot">

                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/template/vendor/jquery/jquery.min.js"></script>
        <script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/template/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/template/js/sb-admin-2.min.js"></script>

</body>

</html>