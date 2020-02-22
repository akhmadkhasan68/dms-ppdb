<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title ">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-add-user icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Detail Siswa <span class="nama-siswa-heading"></span>
                        <div class="page-title-subheading">Detail Data Siswa <span class="nama-siswa-heading"></span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <button id="edit-siswa" class="btn btn-primary btn-lg"><i class="fa fa-edit"></i> Edit Siswa</button>
            </div>
        </div>

        <br>

        <form id="formEdit">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <input type="hidden" id="id-student" name="id">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">1.IDENTITAS CALON PESERTA DIDIK</h5>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">Nama Lengkap</label>
                                        <input name="nama_siswa" id="nama_siswa" placeholder="Tulis nama lengkap anda" type="text" class="form-control" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="exampleCity" class="">Tempat Lahir</label>
                                        <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control"disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="exampleState" class="">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="exampleState" class="">Kewarganegaraan</label>
                                        <input name="kewarganegaraan_siswa" id="kewarganegaraan_siswa" type="text" class="form-control" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleCity" class="">Jumlah Saudara</label>
                                        <input name="anak_bersaudara" id="anak_bersaudara" type="number" class="form-control" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleState" class="">Anak ke berapa</label>
                                        <input name="anak_ke" id="anak_ke" type="number" class="form-control" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">Nomor Induk Siswa Nasional (NISN)</label>
                                        <input name="nisn" id="nisn" type="number" class="form-control" disabled readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">II.KETERANGAN TENTANG ORANG TUA</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div>
                                        <h5 class="card-title">Data Ayah</h5>
                                        <hr>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Nama Ayah</label>
                                                <input name="nama_ayah" id="nama_ayah" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Agama Ayah</label>
                                                <select name="agama_ayah" id="agama_ayah" class="form-control" disabled>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Kewarganegaraan Ayah</label>
                                                <input name="kewarganegaraan_ayah" id="kewarganegaraan_ayah" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Pekerjaan Ayah</label>
                                                <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" disabled>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Tani">Tani</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Polri/TNI">Polri/TNI</option>
                                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Alamat Ayah</label>
                                                <input name="alamat_ayah" id="alamat_ayah" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Nomor Telepon/HP Ayah</label>
                                                <input name="hp_ayah" id="hp_ayah" placeholder="" type="number" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div>
                                        <h5 class="card-title">Data Ibu</h5>
                                        <hr>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Nama Ibu</label>
                                                <input name="nama_ibu" id="nama_ibu" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Agama Ibu</label>
                                                <select name="agama_ibu" id="agama_ibu" class="form-control" disabled>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Kewarganegaraan Ibu</label>
                                                <input name="kewarganegaraan_ibu" id="kewarganegaraan_ibu" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Pekerjaan Ibu</label>
                                                <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" disabled>
                                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Tani">Tani</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Polri/TNI">Polri/TNI</option>
                                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Alamat Ibu</label>
                                                <input name="alamat_ibu" id="alamat_ibu" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Nomor Telepon/HP Ibu</label>
                                                <input name="hp_ibu" id="hp_ibu" placeholder="" type="number" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">III.KETERANGAN TENTANG WALI</h5>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Nama Wali</label>
                                                <input name="nama_wali" id="nama_wali" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Agama Wali</label>
                                                <select name="agama_wali" id="agama_wali" class="form-control" disabled>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Kewarganegaraan Wali</label>
                                                <input name="kewarganegaraan_wali" id="kewarganegaraan_wali" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Pekerjaan Wali</label>
                                                <select name="pekerjaan_wali" id="pekerjaan_wali" class="form-control" disabled>
                                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Tani">Tani</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Polri/TNI">Polri/TNI</option>
                                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                                    <option value="Nelayan">Nelayan</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Alamat Wali</label>
                                                <input name="alamat_wali" id="alamat_wali" placeholder="" type="text" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail11" class="">Nomor Telepon/HP Wali</label>
                                                <input name="hp_wali" id="hp_wali" placeholder="" type="number" class="form-control" readonly disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style="text-align: right">
                                <button type="submit" id="submit-btn" class="btn btn-primary btn-lg">Simpan Formulir Pendaftaran</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<?php include 'modal/modal.php'; ?>
<?php include 'js/js.php'; ?>
<script>
    $(document).ready(function(){
        //GET DETAIL SISWA
        $.ajax({
            url: '<?php echo site_url('pendaftaran/ajax_get_pendaftaran_by_id')?>',
            method: 'GET',
            dataType: 'JSON',
            data: {
                id: <?php echo $id_student;?>,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response){
                $("#id-student").val(response.data.id);
                $(".nama-siswa-heading").html(response.data.nama_siswa);
                $("#nama_siswa").val(response.data.nama_siswa);
                $("#tempat_lahir").val(response.data.tempat_lahir);
                $("#tanggal_lahir").val(response.data.tanggal_lahir);
                $("#kewarganegaraan_siswa").val(response.data.kewarganegaraan_siswa);
                $("#anak_bersaudara").val(response.data.anak_bersaudara);
                $("#anak_ke").val(response.data.anak_ke);
                $("#nisn").val(response.data.nisn);

                $("#nama_ayah").val(response.data.nama_ayah);
                $("#kewarganegaraan_ayah").val(response.data.kewarganegaraan_ayah);
                $("#pekerjaan_ayah").val(response.data.pekerjaan_ayah);
                $("#alamat_ayah").val(response.data.alamat_ayah);
                $("#hp_ayah").val(response.data.hp_ayah);

                $("#nama_ibu").val(response.data.nama_ibu);
                $("#agama_ibu").val(response.data.agama_ibu);
                $("#kewarganegaraan_ibu").val(response.data.kewarganegaraan_ibu);
                $("#pekerjaan_ibu").val(response.data.pekerjaan_ibu);
                $("#alamat_ibu").val(response.data.alamat_ibu);
                $("#hp_ibu").val(response.data.hp_ibu);

                $("#nama_wali").val(response.data.nama_wali);
                $("#agama_wali").val(response.data.agama_Wali);
                $("#kewarganegaraan_wali").val(response.data.kewarganegaraan_wali);
                $("#pekerjaan_wali").val(response.data.pekerjaan_wali);
                $("#alamat_wali").val(response.data.alamat_wali);
                $("#hp_wali").val(response.data.hp_wali);

                $("#submit-btn").css('display', 'none');
                $("#show-modal-verif-trigger").trigger('click');
            }
        });

        $("#edit-siswa").click(function(){
            $('form input[type="text"]').prop("disabled", false);
            $('form input[type="text"]').prop("readonly", false);

            $("#agama_ayah").prop("disabled", false);
            $("#agama_ayah").prop("readonly", false);
            $("#pekerjaan_ayah").prop("disabled", false);
            $("#pekerjaan_ayah").prop("readonly", false);

            $("#agama_ibu").prop("disabled", false);
            $("#agama_ibu").prop("readonly", false);
            $("#pekerjaan_ibu").prop("disabled", false);
            $("#pekerjaan_ibu").prop("readonly", false);

            $("#agama_wali").prop("disabled", false);
            $("#agama_wali").prop("readonly", false);
            $("#pekerjaan_wali").prop("disabled", false);
            $("#pekerjaan_wali").prop("readonly", false);

            $('form input[type="number"]').prop("disabled", false);
            $('form input[type="number"]').prop("readonly", false);

            $('form input[type="date"]').prop("disabled", false);
            $('form input[type="date"]').prop("readonly", false);

            $("#submit-btn").css('display', 'block');
        });

        $("#formEdit").submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                url: '<?php echo site_url('pendaftaran/ajax_action_edit_student');?>',
                type: 'POST',
                dataType: 'JSON',
                data:data,
                beforeSend: function(){ 
                    $(".loader").show();
                },
                success: function(response){
                    console.log(response);
                },
                error: function(){
                    alert('Data Error!');
                }
            });
        });
    });
</script>