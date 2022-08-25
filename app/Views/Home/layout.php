<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/gambar_1.png">

    <title>Cek Larangan Makanan</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="<?= base_url(); ?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/template/css/sb-admin-2.min.css" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/d19818ff6a.js" crossorigin="anonymous"></script>


    <!-- my css -->
    <link rel="stylesheet" href="/template/css/style.css">

</head>

<body id="home">
    <div class="main">
        <nav class="navbar navbar-expand-lg navbar-light border-bottom ">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Pakar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home/index">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu" id="menuAbout" href="/home/about">About</a>
                        </li>

                        <?php if (session()->get('name')) : ?>

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= session()->get('name'); ?>
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    <!-- <img class="img-profile rounded-circle border-5" src="<?= base_url() ?>/img/gambar_1.png" width="30px" height="20px"> -->
                                </a>
                                <!-- Dropdown - Admin Information -->

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <?php if (session()->get('role_id') == 2) : ?>
                                        <a class="dropdown-item" href="<?= base_url() ?>/user">
                                        <?php else : ?>
                                            <a class="dropdown-item" href="<?= base_url() ?>/konsultasi/user">
                                            <?php endif; ?>
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?= base_url() ?>/auth/logout" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link menu" id="menuLogin" href="/auth">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <h1 class="judul h2 text-center font-weight-bold text-white"><?= $title; ?></h1>

        <div class="container-fluid bg_conten" id='container'>

            <!-- content -->
            <div id="content">
                <?= $this->renderSection('content'); ?>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; AndiIksanAdiKusuma 2022</span>
            </div>
        </div>
    </footer>



    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="<?= base_url(); ?>/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url() ?>/template/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url() ?>/template/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/template/js/demo/chart-pie-demo.js"></script> -->

    <div id="script">
        <?= $this->renderSection('script'); ?>
    </div>

</body>

</html>