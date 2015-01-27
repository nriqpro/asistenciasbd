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
        $carreras = array(
//            'id' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
        );
        $query = $this->carrera_model->getCarrera($carreras['nombre']);
        if($query != NULL){
            $data['err'] = "Carrera ya existe";
        }
        else{
            $query = $this->carrera_model->addCarrera($carreras);
        }
            $query = $this->carrera_model->getCarreras();
            $data['carreras'] = $query;
            $this->load->view('layouts/header');
            $this->load->view('layouts/sidebar');
            $this->load->view('admin/verCarrera',$data);
            $this->load->view('layouts/footer');
    }
    
     public function verAsigCarrera(){
         $carreras = array(
            'id' => $this->input->post('id'),
            'nombre' => $this->input->post('nombre'),

        );
         $query = $this->carrera_model->getAsig($carreras['id']);
         if($query == null)
             $data['err'] = "No existen datos cargados.";
        $data['asignaturas'] = $query;
        $data['carreras']=$carreras;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('carrera/ver_asig_carrera',$data);
        $this->load->view('layouts/footer');
    }
     public function addAsigCarrera(){
         $carreras = array(
            'id' => $this->input->post('id'),
            'nombre' => $this->input->post('nombre'),

        );
         $query = $this->carrera_model->getAsigNot($carreras['id']);
         if($query == null)
             $data['err'] = "Todas las asignaturas existentes estan asignadas.";
        $data['asignaturas'] = $query;
        $data['carreras']=$carreras;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('carrera/form_asig_carrera',$data);
        $this->load->view('layouts/footer');
    }
    public function addAsig(){
         $carreras = array(
            'id' => $this->input->post('id'),
            'total' => $this->input->post('tasig'),
        );
        $i=0;

        $variables =  $this->input->post();

        for($i=0; $i<$carreras['total'];$i++){
            $asig = $this->input->post($i);
            if((!empty($asig)))
                $query = $this->carrera_model->addAsig($carreras['id'],$asig);
        }

//
        $data['carreras']= $this->carrera_model->getCarreras();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('carrera/ver_asig_carrera',$data);
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
            'nombre' => $this->input->post('nombre'),
            'id' => $this->input->post('id'),
        );

        $data['carreras']=$carreras;
        $query = $this->carrera_model->getCarrera($carreras['nombre']);
        foreach($query as $loop){
        if($carreras['nombre'] != $loop->nombre){

            if($query != NULL){
                $data['err'] = "Carrera ya existe";
            }
            else{
                 $result = $this->carrera_model->updateCarrera($carreras);
            }
        }
        }
        $query = $this->carrera_model->getCarreras();
        $data['carreras'] = $query;
         
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verCarrera',$data);
        $this->load->view('layouts/footer');
    }
    
      public function cargarCarBuscada(){
        $carreras= $this->input->post('nombreb');
        $query = $this->carrera_model->getCarrera($carreras);
        $data['carreras'] = $query;

        if($query == NULL){
                $data['err'] = "No existe la carrera buscada.";
                $query = $this->carrera_model->getCarreras();
                $data['carreras'] = $query;
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verCarrera', $data);
        $this->load->view('layouts/footer');
    }
    
    
}
