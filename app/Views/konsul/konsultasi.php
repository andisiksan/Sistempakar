<?= $this->extend('home/layout'); ?>

<?= $this->section('content') ?>

<div class="container my-4">

    <div class="card shadow  ">
        <!-- pilih penyakit -->



        <!-- gejala berdasarakan penyakit -->

        <div class="card-body px-4 py-2">
            <h5 class="text-center font-weight-bold text-success">Pilih Gejala</h5>
            <hr>
        </div>
        <div class="card-body">
            <form action="/konsultasi/create" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-dark" id="table-gejala" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Gejala</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <?php $i = 1;
                        foreach ($selectPenyakit as $gejala) : ?>

                            <input type="hidden" name="idGejala[]" value="<?= $gejala['idGejala']; ?>">
                            <input type="hidden" name="idPenyakit[]" value="<?= $gejala['idPenyakit']; ?>">
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $gejala['namaGejala']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <select class="form-select form-select-sm btn btn-outline-dark dropdown-toggle" required name="cfUser[]" aria-label=".form-select-sm example">
                                            <!-- <option label="Please Select" value=""></option> -->
                                            <?php foreach ($bobot as $b) : ?>
                                                <option value="<?= $b['nilai']; ?>"><?= $b['ket']; ?> : <?= $b['nilai']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>


                <div class="text-center">
                    <button class="btn btn-success mt-3 " type="submit">Lanjut</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>