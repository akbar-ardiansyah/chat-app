<style>

    table tr th {
        text-align: center;
    }

    select.form-control {
        color: inherit !important;
    }

</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Laporan Kunjungan Berdasarkan Poliklinik</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-7">
                                <form method="GET" action="<?= current_url() ?>">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="tahun" class="col-form-label">Filter Tahun Kunjungan</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select id="tahun" name="tahun" class="form-control">
                                                <?php foreach(range(date('Y'), date('Y') - 10) as $tahun): ?>
                                                    <option <?= $tahun == $selected_tahun ? 'selected' : '' ?> value="<?= $tahun ?>"><?= $tahun ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label"></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-success btn-xs">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>

                        <table id="data_kunjungan" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">NO</th>
                                    <th rowspan="2">NAMA POLIKLINIK</th>
                                    <th colspan="12">BULAN</th>
                                </tr>
                                <tr>
                                    <?php foreach(range(1, 12) as $bulan): ?>
                                        <th><?= date('M', strtotime("2022-$bulan-01")) ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                
                            </thead>

                            <tbody>
                                <?php $nama_poli = ['ANAK', 'PENYAKIT DALAM', 'BEDAH', 'JANTUNG', 'MATA'] ?>

                                <?php foreach($nama_poli as $key => $poli): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>POLI <?= $poli ?></td>
                                        <?php foreach(range(1, 12) as $month): ?>
                                            <td><?= rand(100, 500) ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
