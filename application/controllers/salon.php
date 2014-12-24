<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salon extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Salon_model');
    }
    
     public function verSalones(){
         
        $data['salones'] = $this->Salon_model->getSalones();
        $this->load->view('layouts/header');
         $this->load->view('layouts/sidebar');
        $this->load->view('admin/salon/salones_view',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioSalon(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/salon/form_salon_view');
        $this->load->view('layouts/footer');
    }
    
    public function registrarSalon(){
        
        $codigo = $this->input->post('modulo')."-".$this->input->post('piso'). $this->input->post('nro');
        
        //echo $codigo;
        $salon = array(
            'cod_salon' => $codigo,
            'capacidad' => $this->input->post('capacidad')
        );
        
        $result = $this->Salon_model->addSalon($salon);
        $this->verSalones();
    }
}

?>