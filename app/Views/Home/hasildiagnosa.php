<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>


<div class="wrapper main" id="main_utama">
    <div class="container main">
        <h4 class="header-text text-white">Berdasarkan Gejala-Gejala yang telah dipilih,maka anda mengalami penyakit:</h4>
        <div class="row">
            <div class="col-6">
                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Penyakit</th>
                            <th scope="col">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h4 class="header-text text-white">kami menganjurkan untuk mengkonsumsi makanan ini :</h4>
        <div class="row">
            <div class="col-6">
                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Penyakit</th>
                            <th scope="col">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <h4 class="header-text text-white">kami menganjurkan untuk tidak mengkonsumsi makanan ini :</h4>
        <div class="row">
            <div class="col-6">
                <table class="table table-bordered text-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Penyakit</th>
                            <th scope="col">Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>