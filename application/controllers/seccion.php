<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seccion extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('seccion_model');
    }
    
    public function index(){
        $query = $this->seccion_model->getSecciones();
        $data['seccion'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
<<<<<<< HEAD
        $this->load->view('admin/verSeccion',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioSeccion(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('asignatura/form_asig_view');
        $this->load->view('layouts/footer');
    }
    
    public function addSeccion(){
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
    
    
    public function cargarEditarSec(){
        $seccion = array(
            'cod_peri' => $this->input->post('cod_peri'),
            'ci_profe' => $this->input->post('ci_profe'),
            'cod_asig'  => $this->input->post('cod_asig'),
            'cod_seccion'  => $this->input->post('cod_seccion'),
        );
        $data['seccion']=$seccion;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('seccion/form_edit_seccion',$data);
        $this->load->view('layouts/footer');
    }
    
     public function editarSeccion(){
        $seccion = array(
            'cod_peri' => $this->input->post('cod_peri'),
            'ci_profe' => $this->input->post('ci_profe'),
            'cod_asig'  => $this->input->post('cod_asig'),
            'cod_seccion'  => $this->input->post('cod_seccion'),
        );
        $data['seccion']=$seccion;
        $query = $this->seccion_model->updateSeccion($seccion);
        
        if($query ==NULL){
            $data['err'] = "Error, asegurese de que los datos esten registrados actualmente."    ;   
        }
        $query = $this->seccion_model->getSecciones();
        $data['seccion'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verSeccion',$data);
        $this->load->view('layouts/footer');
    }
    
    
    public function seccionInfo(){
        $tipo = $this->input->post('tipo');
        $contenido = $this->input->post('contenido');
        
        if (strcasecmp($tipo,"Profesor")==0){
            $data['seccion'] = $this->seccion_model->getSecByProfe($contenido);
            
            if($data['seccion'] != NULL){
                $this->load->view('layouts/header');
                $this->load->view('layouts/sidebar');
                $this->load->view('seccion/seccion_view_prof',$data);
                $this->load->view('layouts/footer');     
            }
            else{ 
                $data['err'] = "No se encontro informacion";
                $this->load->view('layouts/header');
                $this->load->view('layouts/sidebar');
                $this->load->view('seccion/seccion_view_prof',$data);
                $this->load->view('layouts/footer');   
            }
                
        }else if(strcasecmp($tipo,"Asig")==0){
                    $data['seccion'] = $this->seccion_model->getSecByAsig($contenido);
                    if($data['seccion'] != NULL){
                            $this->load->view('layouts/header');
                            $this->load->view('layouts/sidebar');
                            $this->load->view('seccion/seccion_view_asig',$data);
                            $this->load->view('layouts/footer');     
                        }
                        else{ 
                            $data['err'] = "No se encontro informacion";
                            $this->load->view('layouts/header');
                            $this->load->view('layouts/sidebar');
                            $this->load->view('seccion/seccion_view_asig',$data);
                            $this->load->view('layouts/footer');   
                        }
                    }
                else if(strcasecmp($tipo,"Seccion")==0){
                        $data['seccion'] = $this->seccion_model->getSeccion($contenido);
                        if($data['seccion'] != NULL){
                            $this->load->view('layouts/header');
                            $this->load->view('layouts/sidebar');
                            $this->load->view('admin/verSeccion',$data);
                            $this->load->view('layouts/footer');     
                        }
                        else{ 
                            $data['err'] = "No se encontro informacion";
                            $this->load->view('layouts/header');
                            $this->load->view('layouts/sidebar');
                            $this->load->view('admin/verSeccion',$data);
                            $this->load->view('layouts/footer');   
                        }
                    }
                    else if(strcasecmp($tipo,"Periodo")==0){
                        $data['seccion'] = $this->seccion_model->getSecByPeriodo($contenido);
                         if($data['seccion'] != NULL){
                            $this->load->view('layouts/header');
                            $this->load->view('layouts/sidebar');
                            $this->load->view('admin/verSeccion',$data);
                            $this->load->view('layouts/footer');     
                        }
                        else{ 
                            $data['err'] = "No se encontro informacion";
                            $this->load->view('layouts/header');
                            $this->load->view('layouts/sidebar');
                            $this->load->view('admin/verSeccion',$data);
                            $this->load->view('layouts/footer');   
                        }
                    }
        
    }
}
=======
        $this->load->view('admin/seccion/secciones_view',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioPeriodo(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('periodo/form_periodo_view');
        $this->load->view('layouts/footer');
    }
    
   
        
}
>>>>>>> secciones a ver
