<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        // $data['content'] = 'Dashboard';
        // $data['header'] = 'Dashboard';
        // $this->load->view('template', $data);
        echo uniqid();
    }

}

/* End of file Dashboard.php */

?>