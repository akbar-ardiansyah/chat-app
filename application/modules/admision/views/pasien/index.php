<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pendaftaran Pasien Berobat</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-7">
                                <form method="GET" action="<?= current_url() ?>">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="tgl_berobat" class="col-form-label">Filter Tanggal Berobat</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="date" id="tgl_berobat" name="tgl_berobat" value="<?= $tgl_berobat ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label"></label>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success btn-xs">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <table id="data_pasien" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>NIK</th>
                                    <th>Tgl.Berobat</th>
                                    <th>Asuransi</th>
                                    <th>Poliklinik</th>
                                    <th>Dokter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pasiens as $key => $pasien): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $pasien->nama_pasien ?></td>
                                        <td><?= $pasien->nik ?></td>
                                        <td><?= $pasien->tgl_berobat ?></td>
                                        <td><?= $pasien->nama_asuransi ?></td>
                                        <td><?= $pasien->nama_poliklinik ?></td>
                                        <td><?= $pasien->nama_dokter ?></td>
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


<script>
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {
            
            $('#data_pasien').DataTable();
            
        }
    }
</script>