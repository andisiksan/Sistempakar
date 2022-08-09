<?= $this->extend('home/layout'); ?>
<?= $this->section('content'); ?>

<div class="wrapper main" id="main_utama">
    <div class="container ">

        <div class="row justify-content-center">
            <!-- <div class="card col-md-4">
                <h4 class="">Pilih penyakit terlebih dahulu</h4>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Penyakit
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <?php foreach ($penyakit as $p) : ?>
                            <form action="" method="POST">
                                <button type="submit" class="dropdown-item">
                                    <input type="hidden" name="penyakitkeyword" value="<?= $p['id_penyakit']; ?>">
                                    <?= $p['nama_penyakit']; ?>
                                </button>
                            </form>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div> -->
            <!-- <div class="card1 col-md-8">
                <form action="" method="POST"> -->
            <!-- <div class="card_judul"> -->
            <!-- <h5 class="header-text text-white">Pilih gejala berdasarkan penyakit</h5> -->
            <!-- <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pilih Penyakit -->
            <!-- </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <?php foreach ($penyakit as $p) : ?>
                                    <form action="" method="POST">
                                        <button type="submit" class="dropdown-item">
                                            <input type="hidden" name="penyakitkeyword" value="<?= $p['id_penyakit']; ?>">
                                            <?= $p['nama_penyakit']; ?>
                                        </button>
                                    </form>
                                <?php endforeach; ?> -->
            <!-- 
                            </div>
                        </div>
                    </div> -->

            <!-- <div class="main">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pilih Penyakit
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <?php foreach ($penyakit as $p) : ?>
                                    <form action="" method="POST">
                                        <button type="submit" class="dropdown-item">
                                            <input type="hidden" name="penyakitkeyword" value="<?= $p['id_penyakit']; ?>">
                                            <?= $p['nama_penyakit']; ?>
                                        </button>
                                    </form>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div> -->
            <!-- </form>
            </div> -->
            <div class="card1 col-md-12">

                <form action="<?= base_url() ?>/home/hasilDiagnosa" method="POST">
                    <div class="card_judul mb-5">
                        <!-- <h5 class="header-text text-white">Pilih gejala berdasarkan penyakit</h5> -->
                        <div class="dropdown">
                            <select name="penyakitkeyword" id="penyakitkey">
                                <option selected>Pilih Penyakit</option>
                                <?php foreach ($penyakit as $p) : ?>
                                    <option value="<?= $p['id_penyakit']; ?>">
                                        <?= $p['nama_penyakit']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="main mb-3">

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nama Gejala</th>
                                <th>Tingkat Kepastian</th>
                            </tr>
                            <tbody id="isi">
                                <tr>
                                    <td colspan="2" align="center" class="font-weight-bold text-success">Silahkan Pilih Penyakit</td>
                                </tr>
                            </tbody>

                        </table>
                        <div class="button mt-4 text-center">
                            <button type="submit" class="btn btn-success button1" id="ok">Lihat Hasil</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#penyakitkey').change(function() {

        const url = "http://localhost:8080/home/data-gejala";
        const data = {
            'id': $(this).val()
        };

        fetch(url, {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then((res) => {
                let tbody = '';
                if (res.length === 0) {
                    tbody += `
                    <tr>
                    <td colspan="2" align="center" class="font-weight-bold text-danger">Gejala Kosong</td>
                    </tr>
                    `;
                } else {
                    tbody += res;

                }

                $('#isi').html(tbody);
            });
    })
</script>

<?= $this->endSection(); ?>