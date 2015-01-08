<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seccion extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('seccion_model');
    }
    
    public function index(){
        $query = $this->seccion_model->getSecciones();
        $data['seccion'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/seccion/secciones_view',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioPeriodo(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('periodo/form_periodo_view');
        $this->load->view('layouts/footer');
    }
    
   
        
}