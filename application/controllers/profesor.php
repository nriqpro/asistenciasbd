<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesor extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('profesor_model');
          $this->load->model('asig_model');
          $this->load->model('salon_model');
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
        $query = $this->profesor_model->getProfesor($profesor['cedula']);
        
        if($query == NULL){
            $data['profesor'] = $this->profesor_model->addProfesor($profesor);
        }
        else{
            $data['err'] = "Error, cedula ya registrada.";
        }
        $query = $this->profesor_model->getProfesores();
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
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'sexo' => $this->input->post('sexo'),
            'direccion' => $this->input->post('direccion'),
            'ci' => $this->input->post('ci'),

        );
        $result = $this->profesor_model->updateProfesor($profesor);
        
        if($result == NULL){
            $data['err'] = "Ocurrio un error editando los datos.";
        } 
       
        $query = $this->profesor_model->getProfesores(); 
        $data['profesor'] = $query;
         
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verProf',$data);
        $this->load->view('layouts/footer');
    }
    
      public function profesorByID(){
        $profesor= $this->input->post('cedula');
        $query =$this->profesor_model->getProfesor($profesor);

        if($query == null){
            $data['err'] = "Profesor no registrado.";
            $query = $this->profesor_model->getProfesores();
            $data['profesor'] = $query;
        }
        else
            $data['profesor'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verProf', $data);
        $this->load->view('layouts/footer');
    }
    
    public function cargarCrearSeccion(){
        
        $data['profesor'] = $this->profesor_model->getProfesor($this->input->post('cedula'));
        $data['asignaturas'] = $this->asig_model->getAsignaturas();
        $data['salones'] = $this->salon_model->getSalones();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/crearSeccion',$data);
        $this->load->view('layouts/footer');
    }
    
}
