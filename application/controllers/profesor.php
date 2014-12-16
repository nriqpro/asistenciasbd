<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesor extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('profesor_model');
    }
    
    public function index(){
        $query = $this->profesor_model->getProfesores();
        $data['profesor'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verProf',$data);
        $this->load->view('layouts/footer');
    }
    
     public function formularioProf(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('profesor/form_prof_view');
        $this->load->view('layouts/footer');
    }
    
    public function registrarProfesor(){
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
    
    public function cargarEditarProf(){
         $profesor = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'sexo' => $this->input->post('sexo'),
            'direccion' => $this->input->post('direccion'),

        );
        $data['profesor']=$profesor;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('profesor/form_edit_prof',$data);
        $this->load->view('layouts/footer');
    }
    
     public function editarProfesor(){
        $profesor = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'sexo' => $this->input->post('sexo'),
            'direccion' => $this->input->post('direccion'),
            'ci' => $this->input->post('ci'),

        );
        $data['profesor']=$profesor;
        $result = $this->profesor_model->updateProfesor($profesor);

        $query = $this->profesor_model->getProfesores();
        $data['profesor'] = $query;
         
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verProf',$data);
        $this->load->view('layouts/footer');
    }
    
      public function profesorByID(){
        $profesor= $this->input->post('cedula');
        $data['profesor'] = $this->profesor_model->getProfesor($profesor);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verProf', $data);
        $this->load->view('layouts/footer');
    }
    
    
}
