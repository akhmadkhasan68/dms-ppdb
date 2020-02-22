<div class="modal fade bd-example-modal-lg" id="modal_verifikasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formVerif">
                <input type="hidden" name="id" id="id-siswa-verif">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                <div class="modal-body">
                    <div class="col-md-12 mb-12">
                        <label for="nama_siswa_verif">Nama</label>
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa_verif" placeholder="Dokumen A" disabled readonly>
                    </div>

                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="nisn_siswa_verif">NISN</label>
                        <input type="text" class="form-control" name="nisn" id="nisn_siswa_verif" placeholder="123456" disabled readonly>
                    </div>


                    <div class="col-md-12 mb-12" style="margin-top: 5px">
                        <label for="validationCustom01">Status Siswa</label>
                        <select class="form-control" name="status_pendaftaran" id="status_pendaftaran_verif">
                            <option value="BELUM">Belum Di Verifikasi</option>
                            <option value="DITERIMA">Diterima</option>
                            <option value="DITOLAK">Ditolak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>