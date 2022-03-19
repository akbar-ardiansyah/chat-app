<style>
    .form-group {
        margin-bottom: 0px !important;
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
                        <h4 class="card-title">Formulir Pendaftaran Pasien Berobat</h4>
                        <hr>
                        
                        <form class="form-sample" id="form_pendaftaran" action="<?= current_url() ?>" method="POST">
                            <p class="card-description">
                                Biodata Pasien
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="nama_pasien" class="col-form-label">Nama Lengkap Pasien</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="nik" class="col-form-label">NIK</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="nik" name="nik" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="tgl_lahir" class="col-form-label">Tgl.Lahir</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p class="card-description">
                                Detail Pendaftaran
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="tgl_berobat" class="col-form-label">Tgl.Berobat</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="date" id="tgl_berobat" name="tgl_berobat" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="id_asuransi" class="col-form-label">Pilih Asuransi</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="id_asuransi" id="id_asuransi" class="form-control" required>
                                                <option value="">Pilih Asuransi</option>
                                                <?php foreach($asuransi as $asr): ?>
                                                    <option value="<?= $asr->id_asuransi ?>"><?= $asr->nama_asuransi ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="id_poliklinik" class="col-form-label">Pilih Poliklinik</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="id_poliklinik" id="id_poliklinik" class="form-control" required>
                                                <option value="">Pilih Poliklinik</option>
                                                <?php foreach($poliklinik as $poli): ?>
                                                    <option value="<?= $poli->id_poliklinik ?>"><?= $poli->nama_poliklinik ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="id_dokter" class="col-form-label">Pilih Dokter</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="id_dokter" id="id_dokter" class="form-control" required>
                                                <option value="">Pilih Dokter</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label"></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <button id="btn-save" disabled type="submit" class="btn btn-success"> SIMPAN DATA</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.onreadystatechange = () => {
        if (document.readyState === "complete") {
            
            $('#btn-save').removeAttr('disabled');

            $('#id_poliklinik').change(function(){
                var id_poliklinik = $(this).val();
                
                $('#id_dokter').html('<option value="">Mohon tunggu...</option>');

                $.post(site_url + 'admision/pendaftaran/fetch_dokter', {id_poliklinik}, function(response){
                    $('#id_dokter').html(response);
                });
            });

            $('#form_pendaftaran').submit(function(e){
                e.preventDefault(); 

                $.ajax({
                    type: $(this).attr('method'),
                    data: $(this).serializ(),
                    dataType: 'json',
                    success: function(response){
                        alert(response.message);
                        if (response.status == true) {
                            $('input, select').val('').trigger('change');
                        }
                    },
                    error: function(error){
                        alert('Internal server error');
                    }
                });
            });
        }
    }
</script>