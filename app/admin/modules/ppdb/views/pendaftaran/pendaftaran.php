<div class="app-main__outer" id="div_pendaftaran" style="display: none">
    <div class="app-main__inner">
        <div class="app-page-title ">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-pen icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Form Pendaftaran
                        <div class="page-title-subheading">Silahkan isi data di bawah ini
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">1.IDENTITAS CALON PESERTA DIDIK</h5>
                        <hr>
                        <form id='form' method='post' enctype='multipart/form-data' onsubmit="sendForm();return false">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Lengkap</label><input name="nama_siswa" id="nama_siswa" placeholder="Tulis nama lengkap anda" type="text" class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="exampleCity" class="">Tempat Lahir</label><input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="exampleState" class="">Tanggal Lahir</label><input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="exampleState" class="">Kewarganegaraan</label><input name="kewarganegaraan_siswa" id="kewarganegaraan_siswa" type="text" class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleCity" class="">Jumlah Saudara</label><input name="anak_bersaudara" id="anak_bersaudara" type="number" class="form-control"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="exampleState" class="">Anak ke berapa</label><input name="anak_ke" id="anak_ke" type="number" class="form-control"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="exampleEmail11" class="">Nomor Induk Siswa Nasional (NISN)</label><input name="nisn" id="nisn" type="number" class="form-control"></div>
                                </div>
                            </div>
                        </form>
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
                                <form class="">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Ayah</label><input name="nama_ayah" id="nama_ayah" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Agama Ayah</label>
                                                <select class="form-control" id="agama_ayah" name="agama_ayah">
                                                    <option value="Islam" selected>Islam</option>
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
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Kewarganegaraan Ayah</label><input name="kewarganegaraan_ayah" id="kewarganegaraan_ayah" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Pekerjaan Ayah</label>
                                                <select class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah">
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
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Alamat Ayah</label><input name="alamat_ayah" id="alamat_ayah" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nomor Telepon/HP Ayah</label><input name="hp_ayah" id="hp_ayah" placeholder="" type="number" class="form-control"></div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="col-sm-6">
                                <div>
                                    <h5 class="card-title">Data Ibu</h5>
                                    <hr>
                                </div>
                                <form class="">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Ibu</label><input name="nama_ibu" id="nama_ibu" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Agama Ibu</label>
                                                <select class="form-control" id="agama_ibu" name="agama_ibu">
                                                    <option value="Islam" selected>Islam</option>
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
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Kewarganegaraan Ibu</label><input name="kewarganegaraan_ibu" id="kewarganegaraan_ibu" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Pekerjaan Ibu</label>
                                                <select class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu">
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
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Alamat Ibu</label><input name="alamat_ibu" id="alamat_ibu" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nomor Telepon/HP Ibu</label><input name="hp_ibu" id="hp_ibu" placeholder="" type="number" class="form-control"></div>
                                        </div>
                                    </div>

                                </form>
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
                                <form class="">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Wali</label><input name="nama_wali" id="nama_wali" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Agama Wali</label>
                                                <select class="form-control" id="agama_wali" name="agama_wali">
                                                    <option value="Islam" selected>Islam</option>
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
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Kewarganegaraan Wali</label><input name="kewarganegaraan_wali" id="kewarganegaraan_wali" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Pekerjaan Wali</label>
                                                <select class="form-control" id="pekerjaan_wali" name="pekerjaan_wali">
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
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Alamat Wali</label><input name="alamat_wali" id="alamat_wali" placeholder="" type="text" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nomor Telepon/HP Wali</label><input name="hp_wali" id="hp_wali" placeholder="" type="number" class="form-control"></div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <div style="text-align: right">
                            <input type="submit" value="Simpan Formulir Pendaftaran" class="btn btn-primary btn-lg" onclick='sendForm()'>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include 'modal/modal.php'; ?>
<?php include 'js/js.php'; ?>