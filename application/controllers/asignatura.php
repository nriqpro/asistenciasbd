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
        $this->load->view('admin/verAsig');
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
            'descripcion' => $this->input->post('descricion'),
            'uni_cred' => $this->input->post('uni_cred'),
            'nro_horas' => $this->input->post('nro_horas')
        );
        $data['asignaturas'] = $asignaturas;

         $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verAsig');
        $this->load->view('layouts/footer');
    }

//    public function registrarAlumno(){
//        $alumno = array(
//            'cedula' => $this->input->post('cedula'),
//            'nombre' => $this->input->post('nombre'),
//            'fecha_nac' => $this->input->post('fecha_nac'),
//            'sexo' => $this->input->post('sexo'),
//            'dir' => $this->input->post('dir'),
//            'apellido1' => $this->input->post('apellido1')
//        );
//
//
//        $result = $this->Alumno_model->addAlumno($alumno);
//        $this->index();
        /*$data['message_type']=1;
        $data['message']="Departamento registrado satisfactoriamente";

        $query = $this->Departamentos_model->getDepartamentos();
        $data['departamentos'] = $query;
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionDepartamentos_view');
        $this->load->view('layouts/footer');*/
//    }
    
}
