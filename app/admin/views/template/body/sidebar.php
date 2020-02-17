<div class="app-main">
    <div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
        <div class="app-header__logo">
            <div class="logo-src">
                <h5><?php echo $config->name;?></h5>
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>dashboard" <?php if ($active == "dashboard") {
                                                                                        echo 'class="mm-active"';
                                                                                    } ?>>
                            <i class="metismenu-icon pe-7s-home"></i>
                            Dashboard PPDB
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Pengolahan Dokumen</li>
                    <li data-toggle="modal" data-target="#modal_new_dokument">
                        <a href="#">
                            <i class="metismenu-icon pe-7s-news-paper"></i>
                            Tambah Dokumen
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>dokumen" <?php if ($active == "dokumen") {
                                                                                        echo 'class="mm-active"';
                                                                                    } ?>>
                            <i class="metismenu-icon pe-7s-note2"></i>
                            Data Dokumen
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>approval" <?php if ($active == "approval") {
                                                                                        echo 'class="mm-active"';
                                                                                    } ?>>
                            <i class="metismenu-icon pe-7s-check"></i>
                            Approval Dokumen <div class="mb-2 mr-2 badge badge-pill badge-primary"><?php echo $notif_approve_doc;?></div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>share" <?php if ($active == "share") {
                                                                                    echo 'class="mm-active"';
                                                                                } ?>>
                            <i class="metismenu-icon pe-7s-share"></i>
                            Sharing Dokumen <div class="mb-2 mr-2 badge badge-pill badge-primary"><?php echo $notif_share_doc;?></div>
                        </a>
                    </li>

                    <?php
                        if($this->session->userdata('id_level') == 1){
                    ?>
                    <li class="app-sidebar__heading">Pengelolalan User</li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>pendaftaran" <?php if ($active == "pendaftaran") { echo 'class="mm-active"';} ?>>
                            <i class="metismenu-icon pe-7s-add-user"></i>Siswa Baru
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>pengguna" <?php if ($active == "pengguna") { echo 'class="mm-active"';} ?>>
                            <i class="metismenu-icon pe-7s-user"></i>Pengguna
                        </a>
                    </li>
                    <?php }?>

                    <li class="app-sidebar__heading">Pengaturan</li>
                    <li>
                        <a href="<?php echo base_url() . index_page(); ?>pengaturan" <?php if ($active == "pengaturan") { echo 'class="mm-active"';} ?>>
                            <i class="metismenu-icon pe-7s-settings"></i>Pengaturan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>