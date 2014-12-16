<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asignatura extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('asig_model');
    }
    
    public function index(){
        $query = $this->asig_model->getAsignaturas();
        $data['asignaturas'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verAsig',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioAsig(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('asignatura/form_asig_view');
        $this->load->view('layouts/footer');
    }
    
    public function cargarAsig(){
        $asignaturas = array(

            'descripcion' => $this->input->post('nombre'),
            'uni_cred' => $this->input->post('creditos'),
            'nro_horas' => $this->input->post('horas')
        );
        $data['asignaturas'] = $this->asig_model->addAsignatura($asignaturas);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verAsig',$data);
        $this->load->view('layouts/footer');
    }
    
    
    public function cargarEditarAsig(){
        $asignatura = array(
            'id'  => $this->input->post('id'),
            'descripcion' => $this->input->post('descripcion'),
            'unid' => $this->input->post('uni_cred'),
            'horas' => $this->input->post('nro_horas'),
        );

        $data['asignaturas']=$asignatura;
        $query = $this->asig_model->getAsignaturas();
        $data['asignaturas'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('asignatura/form_edit_asig',$data);
        $this->load->view('layouts/footer');
    }
    
     public function editarAsig(){
        $asignatura = array(
            'descripcion' => $this->input->post('nombre'),
            'unid' => $this->input->post('creditos'),
            'horas' => $this->input->post('horas'),
            'id' => $this->input->post('id'),
        );
        $data['asignaturas']=$asignatura;
        $result = $this->asig_model->updateAsignatura($asignatura);

        $query = $this->asig_model->getAsignaturas();
        $data['asignaturas'] = $query;
         
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verAsig',$data);
        $this->load->view('layouts/footer');
    }
    
    
    public function cargarAsigBuscada(){
        $asignatura= $this->input->post('nombre');
        $data['asignaturas'] = $this->asig_model->getAsig($asignatura);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verAsig',$data);
        $this->load->view('layouts/footer');
    }
        
}
