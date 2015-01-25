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
    
    public function editarSalon(){
        $data['salon'] = $this->input->post('cod_salon');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/salon/form_edit_salon',$data);
        $this->load->view('layouts/footer');
    }
    
    public function updateSalon(){
        $salon = array (
           'capacidad' => $this->input->post('capacidad'),
            'cod_salon' => $this->input->post('cod_salon')
        );
        
        echo  "hola".$salon['cod_salon'];
        $this->Salon_model->updateSalon($salon);
        $this->verSalones();
    }
}

?>
