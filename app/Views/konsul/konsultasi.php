<?= $this->extend('home/layout'); ?>

<?= $this->section('content') ?>

<div class="container my-4">


    <div class="container my-4">
        <div class="card shadow  ">



            <!-- pilih penyakit -->
            <?php if (!$selectPenyakit) : ?>
                <div class="card-body px-4 py-2">
                    <h3 class="text-center">Pilih Penyakit Terlebih Dahulu</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="card py-4 px-3 shadow text-center">
                        <form action="/konsultasi" method="POST" enctype="multipart/form-data">
                            <div class="list-group">
                                <?php foreach ($penyakit as $res) : ?>
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" name="id[]" value="<?= $res['idPenyakit']; ?>" type="checkbox">
                                        <?= $res['namaPenyakit']; ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                            <button class="btn btn-primary mt-3" type="submit">Lanjut</button>
                        </form>
                    </div>
                </div>

                <!-- gejala berdasarakan penyakit -->
            <?php else : ?>
                <div class="card-body px-4 py-2">
                    <h3 class="text-center">Pilih Gejala Berdasarkan Penyakit</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <form action="/konsultasi/create" method="POST" enctype="multipart/form-data">
                        <?php $i = 1;
                        foreach ($selectPenyakit as $select) : ?>
                            <input type="hidden" name="idUser" value="1">
                            <div class="card py-4 px-4 mb-4 shadow">
                                <h5 class="card-title text-capitalize"><span style="margin-right: 15px;"><?= $i++; ?>.</span><?= $select['namaPenyakit']; ?></h5>
                                <!-- <input type="hidden" name="idPenyakit" value="<?= $select['idPenyakit']; ?>"> -->
                                <div class="card-body" style="margin-left: 15px;">
                                    <?php foreach ($select['namaGejala'] as $gejala) : ?>
                                        <div class="row mb-3">
                                            <input type="hidden" name="idGejala[]" value="<?= $gejala['idGejala']; ?>">
                                            <input type="hidden" name="idPenyakit[]" value="<?= $gejala['idPenyakit']; ?>">
                                            <label for="inputPassword" class="col-sm-8 col-form-label"><?= $gejala['namaGejala']; ?>?</label>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <select class="custom-select-sm" required name="cfUser[]" aria-label=".custom-select-sm example">
                                                        <option label="Pilih" value=""></option>
                                                        <?php foreach ($bobot as $b) : ?>
                                                            <option value="<?= $b['nilai']; ?>"><?= $b['ket']; ?> : <?= $b['nilai']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="text-center">
                            <button class="btn btn-primary mt-3 " type="submit">Lanjut</button>
                        </div>
                    <?php endif; ?>
                    </form>
                </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>