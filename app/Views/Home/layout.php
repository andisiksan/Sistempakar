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
                <a class="navbar-brand text-white" href="#">Sistem Pakar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="/home/index">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <h1 class="judul h3 text-center text-white font-weight-bold"><?= $title; ?></h1>

        <div class="container-fluid bg_conten">

            <!-- content -->
            <?= $this->renderSection('content'); ?>


        </div>
    </div>







    <!-- Footer -->
    <footer class="sticky-footer bg-success">
        <div class="container my-auto">
            <div class="copyright text-center text-white my-auto">
                <span>Copyright &copy; AndiIksanAdiKusuma 2022</span>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/template/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/template/js/demo/chart-pie-demo.js"></script>

</body>

</html>