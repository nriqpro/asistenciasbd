<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
    
    public function index()
    {
        
	   
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/admin');
        $this->load->view('layouts/footer');   
    }

    
}
?>
