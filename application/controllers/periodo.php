<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodo extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('periodo_model');
    }
    
    public function index(){
        $query = $this->periodo_model->getPeriodos();
        $data['periodo'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verPeriodo',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioPeriodo(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('periodo/form_periodo_view');
        $this->load->view('layouts/footer');
    }
    
    public function addPeriodo(){
        $periodo = array(
            'id' => $this->input->post('id'),
            'inicio' => $this->input->post('inicio'),
            'fin' => $this->input->post('fin')
        );
        $query = $this->periodo_model->getPeriodo($periodo['id']);
        if($periodo['inicio'] > $periodo['fin'])
                $data['err'] = "Fecha de inicio no puede ser mayor que fecha fin.";
        else{
            if($query == NULL){
                $data['periodo'] = $this->periodo_model->addPeriodo($periodo);
            }
            else{
                $data['err'] = "Error, el codigo ya existe";
            }
        }
        $data['periodo'] = $this->periodo_model->getPeriodos();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verPeriodo',$data);
        $this->load->view('layouts/footer');
    }
    
    
    public function cargarEditarPeriodo(){
         $periodo = array(
            'id' => $this->input->post('id'),
            'inicio' => $this->input->post('inicio'),
            'fin' => $this->input->post('fin')
        );

        $data['periodo']=$periodo;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('periodo/form_edit_periodo',$data);
        $this->load->view('layouts/footer');
    }
    
     public function editarPeriodo(){
        $periodo = array(
            'inicio' => $this->input->post('inicio'),
            'fin' => $this->input->post('fin'),
            'id' => $this->input->post('id'),
            'id_prev' => $this->input->post('id_prev') 
        );
         
        if($periodo['inicio'] > $periodo['fin'])
            $data['err'] = "Fecha de inicio no puede ser mayor que fecha fin.";
        else{
            $data['periodo']=$periodo;
            $result = $this->periodo_model->updatePeriodo($periodo);

            if($result == NULL){
                  $data['err'] = "Error, el codigo ya existe";
            }
        }
        $query = $this->periodo_model->getPeriodos();
        $data['periodo'] = $query;
         
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verPeriodo',$data);
        $this->load->view('layouts/footer');
    }
    
    
    public function getPeriodo(){
        $periodo= $this->input->post('id');
        $query = $this->periodo_model->getPeriodo($periodo);
        if($query == NULL){
              $data['err'] = "Error, periodo no registrado.";
              $query = $this->periodo_model->getPeriodos();
              $data['periodo'] = $query;
        }
        else
            $data['periodo'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verPeriodo',$data);
        $this->load->view('layouts/footer');
    }
    
  
        
}
