<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

/**
 * Description of my_controller
 *
 * @author https://roytuts.com
 */
class MY_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
        if (version_compare(CI_VERSION, '2.1.0', '<')) {
            $this->load->library('security');
        }
    }

    function check_key(){
        if($this->input->post('key')!="resv2_ad25eb19c4d238099e72036375350ee9")
		die(json_encode(array('result' => false, 'message' => 'aPI KEY FALSE')));
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */