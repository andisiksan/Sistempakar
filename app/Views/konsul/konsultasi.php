<?= $this->extend('home/layout'); ?>

<?= $this->section('content') ?>

<div class="container my-4">

    <?php if (session()->getFlashdata('pesan')) : ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> <?= session()->getFlashdata('pesan'); ?>.
        </div>

    <?php endif; ?>

    <?php if (session()->getFlashdata('pesanGagal')) : ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>!!!</strong> <?= session()->getFlashdata('pesanGagal'); ?>.
        </div>

    <?php endif; ?>

    <div class="row my-5">
        <div class="col-sm-3">
            <div class="card py-4 px-3 shadow">
                <form action="/konsultasi" method="POST" enctype="multipart/form-data">
                    <div class="list-group">
                        <?php foreach ($penyakit as $res) : ?>
                            <label class="list-group-item">
                                <input class="form-check-input me-1" name="id[]" value="<?= $res['id_penyakit']; ?>" type="checkbox">
                                <?= $res['nama_penyakit']; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Lanjut</button>
                </form>
            </div>
        </div>
        <div class="col-sm-9">
            <?php if (!$selectPenyakit) : ?>
                <div class="card py-4 px-4 shadow">
                    <h5 class="card-title">Konsultasi</h5>
                    <p>Pilih penyakit yang ada pada list yang ingin anda konsultasi</p>
                </div>
            <?php else : ?>
                <form action="/konsultasi/create" method="POST" enctype="multipart/form-data">
                    <?php $i = 1;
                    foreach ($selectPenyakit as $select) : ?>
                        <input type="hidden" name="idUser" value="1">
                        <div class="card py-4 px-4 mb-4 shadow">
                            <h5 class="card-title text-capitalize"><span style="margin-right: 15px;"><?= $i++; ?>.</span><?= $select['nama_penyakit']; ?></h5>
                            <!-- <input type="hidden" name="idPenyakit" value="<?= $select['id_penyakit']; ?>"> -->
                            <div class="card-body" style="margin-left: 15px;">
                                <?php foreach ($select['input_gejala'] as $gejala) : ?>
                                    <div class="row mb-3">
                                        <input type="hidden" name="idGejala[]" value="<?= $gejala['id_gejala']; ?>">
                                        <input type="hidden" name="idPenyakit[]" value="<?= $gejala['id_penyakit']; ?>">
                                        <label for="inputPassword" class="col-sm-8 col-form-label">Apakan anda mengalami <?= $gejala['input_gejala']; ?>?</label>
                                        <div class="col-sm-4">
                                            <select class="form-select form-select-sm" required name="cfUser[]" aria-label=".form-select-sm example">
                                                <option label="Please Select" value=""></option>
                                                <?php foreach ($bobot as $b) : ?>
                                                    <option value="<?= $b['nilai']; ?>"><?= $b['ket']; ?> : <?= $b['nilai']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button class="btn btn-primary mt-3" type="submit">Lanjut</button>
                <?php endif; ?>
                </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>