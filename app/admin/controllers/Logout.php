<?php
    defined('BASEPATH') or exit ('no direct script access allowed');

    class Logout extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('common');
            $this->load->library('session');
        }
        public function ajax_action_logout()
        {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('id_level');
            $this->session->unset_userdata('level');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');

            $this->session->sess_destroy();
        }
    }
?>