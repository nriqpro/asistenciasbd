<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Alumno_model');
    }
    
    public function index(){

        $this->load->view('layouts/header');
        $this->load->view('home_view');
        $this->load->view('layouts/footer');
    }

    public function formularioAlumno(){
        $this->load->view('layouts/header');
        $this->load->view('alumno/form_alumno_view');
        $this->load->view('layouts/footer');
    }

    public function registrarAlumno(){
        $alumno = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'fecha_nac' => $this->input->post('fecha_nac'),
            'sexo' => $this->input->post('sexo'),
            'dir' => $this->input->post('dir'),
            'apellido1' => $this->input->post('apellido1')
        );


        $result = $this->Alumno_model->addAlumno($alumno);
        $this->index();
        /*$data['message_type']=1;
        $data['message']="Departamento registrado satisfactoriamente";

        $query = $this->Departamentos_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDepartamentos_view');
        $this->load->view('layouts/footer');*/
    }
    
}
