<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrera extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('carrera_model');
    }
    
    public function index(){
        $query = $this->carrera_model->getCarreras();
        $data['carreras'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verCarrera',$data);
        $this->load->view('layouts/footer');
    }
    
     public function formularioCarrera(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('carrera/form_carrera_view');
        $this->load->view('layouts/footer');
    }
    
    public function registrarCarrera(){
        $profesor = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'sexo' => $this->input->post('sexo'),
            'direccion' => $this->input->post('direccion'),

        );
        $data['profesor'] = $this->profesor_model->addProfesor($profesor);
        $query = $this->asig_model->getProfesores();
        $data['profesor'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verProf',$data);
        $this->load->view('layouts/footer');
    }
    
    public function cargarEditarCarrera(){
         $carreras = array(
            'id' => $this->input->post('id'),
            'nombre' => $this->input->post('nombre'),

        );
        $data['carreras']=$carreras;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('carrera/form_edit_carrera',$data);
        $this->load->view('layouts/footer');
    }
    
     public function editarCarrera(){
        $carreras = array(
            'id' => $this->input->post('id'),
            'nombre' => $this->input->post('nombre'),

        );

        $data['carreras']=$carreras;
        $result = $this->carrera_model->updateCarrera($carreras);

        $query = $this->carrera_model->getCarreras();
        $data['carreras'] = $query;
         
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verCarrera',$data);
        $this->load->view('layouts/footer');
    }
    
      public function cargarCarBuscada(){
        $carreras= $this->input->post('nombreb');
        $data['carreras'] = $this->carrera_model->getCarrera($carreras);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verCarrera', $data);
        $this->load->view('layouts/footer');
    }
    
    
}
