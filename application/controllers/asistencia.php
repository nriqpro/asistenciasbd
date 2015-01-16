<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asistencia extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('asis_model');
         $this->load->model('periodo_model');
        $this->load->model('alumno_model');
    }
    
    public function asistenciaSec(){
        $asis = $this->input->post('cod_seccion');
        $query = $this->asis_model->getAsis($asis);
        $data['actual'] = $this->periodo_model->getPeriodoActual();
        if($query == null)
            $data['err'] = "No existen asistencias cargadas.";
        
        $data['asis'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verAsis',$data);
        $this->load->view('layouts/footer');
    }

    public function verAsisAlumnos(){
         $asis = array(
            'cod_seccion'  => $this->input->post('cod_seccion'),
            'cod_asis'  => $this->input->post('cod_asis'),
            'cod_sec'  => $this->input->post('cod_seccion'),
            'fecha'  => $this->input->post('fecha'), 
        );
        $query = $this->asis_model->asisAlumnos($asis);
        $query2 = $this->asis_model->inasistentes($asis);
        if($query == null){
            $data['err'] = "No se ha cargado asistencia."; 
            $this->load->view('layouts/header');
            $this->load->view('layouts/sidebar');
            $this->load->view('asistencia/alumnos_asis_view',$data);
            $this->load->view('layouts/footer');   
        }
        else if($query2 == NULL){
                $data['asis'] = $query;
                $data['err2'] = "No hay inasistentes.";
                $this->load->view('layouts/header');
                $this->load->view('layouts/sidebar');
                $this->load->view('asistencia/alumnos_asis_view',$data);
                $this->load->view('layouts/footer');   
            }
            else{
                $data['asis'] = $query;
                $data['inas'] = $query2;
                $this->load->view('layouts/header');
                $this->load->view('layouts/sidebar');
                $this->load->view('asistencia/alumnos_asis_view',$data);
                $this->load->view('layouts/footer');   
                
            }
        
    }
    public function cargarAddAsis(){
         $asis = array(
            'cod_seccion'  => $this->input->post('cod_seccion'),
            'cod_asis'  => $this->input->post('cod_asis'),
        );
        $data['asis'] = $this->alumno_model->getAlumnosBySeccion($asis['cod_seccion']);
        $data['asistencia'] = $this->asis_model->getAsis($asis['cod_seccion']);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('asistencia/form_asis_view', $data);
        $this->load->view('layouts/footer');
    }
    
    public function addAsisAlumno(){
        $asis = array(
             'ci_est'  => $this->input->post('ci_est'),
        );
        $cod_asis = $this->input->post('cod_asis');
        $sec = array('cod_seccion' => $this->input->post('cod_seccion'));
        
        $i=0;
        $flag = 0;
            if(is_array($asis) && count($asis)) {
                    foreach($asis as $loop){
                         for($i=0; $flag!=1; $i++){
//                       $data['asis'] = $this->asis_model->addAsisAlumno($loop, $cod_asis);
//                    if (count($asis)==1)
//                         $data['asis'] = $this->asis_model->addAsisAlumno($loop[$i], $cod_asis[count($asis)+1]);
//                    else{for($i=0; $i<count($asis)+2; $i++){
//    //                    echo ($loop[$i]);
                        if($loop[$i] != ""){
                             echo $loop[$i];
//                            $data['asis'] = $this->asis_model->addAsisAlumno($loop[$i], $cod_asis[count($asis)+1]);
                        }
                        else{
                            $flag = 1;
                        }
//    //                    echo "<br>";
//                        }
//                    }
//                }
                                                 }
                    }
                
//            $query = $this->asis_model->asisAlumnos($cod_asis[count($asis)+1]);
//            $query2 = $this->asis_model->inasistentes($asis);
//            $seccion =  $this->seccion_model->getSeccion($sec);
            
//            echo $seccion['cod_peri'];
            
//        if($query == null){
//            $data['err'] = "No se ha cargado asistencia."; 
//            $this->load->view('layouts/header');
//            $this->load->view('layouts/sidebar');
//            $this->load->view('asistencia/alumnos_asis_view',$data);
//            $this->load->view('layouts/footer');   
//        }
//        else if($query2 == NULL){
//                $data['asis'] = $query;
//                $data['err2'] = "No hay inasistentes.";
//                $this->load->view('layouts/header');
//                $this->load->view('layouts/sidebar');
//                $this->load->view('asistencia/alumnos_asis_view',$data);
//                $this->load->view('layouts/footer');   
//            }
//            else{
//                $data['asis'] = $query;
//                $data['inas'] = $query2;
//                $this->load->view('layouts/header');
//                $this->load->view('layouts/sidebar');
//                $this->load->view('asistencia/alumnos_asis_view',$data);
//                $this->load->view('layouts/footer');   
//                
//            }
        }     
        else{
            $data['err'] = "Error cargando asistencia";
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
//        $this->load->view('admin/verAsig',$data);
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
