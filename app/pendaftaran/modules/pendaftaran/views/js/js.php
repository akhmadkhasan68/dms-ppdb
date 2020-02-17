<script>
    function sendForm() {
        var form_data = new FormData();
        form_data.append('nama_siswa', $('#nama_siswa').val());
        form_data.append('tempat_lahir', $('#tempat_lahir').val());
        form_data.append('tanggal_lahir', $('#tanggal_lahir').val());
        form_data.append('kewarganegaraan_siswa', $('#kewarganegaraan_siswa').val());
        form_data.append('anak_bersaudara', $('#anak_bersaudara').val());
        form_data.append('anak_ke', $('#anak_ke').val());
        form_data.append('nisn', $('#nisn').val());
        form_data.append('nama_ayah', $('#nama_ayah').val());
        form_data.append('kewarganegaraan_ayah', $('#kewarganegaraan_ayah').val());
        form_data.append('pekerjaan_ayah', $('#pekerjaan_ayah').val());
        form_data.append('alamat_ayah', $('#alamat_ayah').val());
        form_data.append('hp_ayah', $('#hp_ayah').val());
        form_data.append('agama_ayah', $('#agama_ayah').val());
        form_data.append('nama_ibu', $('#nama_ibu').val());
        form_data.append('kewarganegaraan_ibu', $('#kewarganegaraan_ibu').val());
        form_data.append('pekerjaan_ibu', $('#pekerjaan_ibu').val());
        form_data.append('alamat_ibu', $('#alamat_ibu').val());
        form_data.append('hp_ibu', $('#hp_ibu').val());
        form_data.append('agama_ibu', $('#agama_ibu').val());
        form_data.append('nama_wali', $('#nama_wali').val());
        form_data.append('kewarganegaraan_wali', $('#kewarganegaraan_wali').val());
        form_data.append('pekerjaan_wali', $('#pekerjaan_wali').val());
        form_data.append('alamat_wali', $('#alamat_wali').val());
        form_data.append('hp_wali', $('#hp_wali').val());
        form_data.append('agama_wali', $('#agama_wali').val());
        form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
        addItemSerialize("<?php echo base_url() . $this->config->item('index_page'); ?>/pendaftaran/ajax_add_pendaftar/", "POST", form_data);
    }
</script>