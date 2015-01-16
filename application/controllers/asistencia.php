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
        $query = $this->asis_model->getAsisSecc($asis);
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
        $data['asistencia'] = $this->asis_model->getAsis($asis['cod_asis']);
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
        $total = $this->input->post('contador');
  
        $i=0;
        $ci = 0;
            if(is_array($asis) && count($asis)) {
                 for($i=0; $i<$total; $i++){
                     foreach($asis as $loop){                  
                        $ci = $loop[$i]; 
                         $data['asis'] = $this->asis_model->addAsisAlumno($ci, $cod_asis);
                    echo "<br>";
//                                        
                    }
                 }
                $nueva = $this->asis_model->getAsis($cod_asis);
                foreach($nueva as $loop){
                    $codigos = array( 'cod_seccion'  => $loop->cod_seccion,
                                        'cod_asis'  => $loop->cod_asis,
                                        'cod_sec'  => $loop->cod_seccion,
                                        'fecha'  => $loop->fecha);

                }
            $query = $this->asis_model->asisAlumnos($codigos);
            $query2 = $this->asis_model->inasistentes($codigos);
//            $seccion =  $this->seccion_model->getSeccion($sec);
            
//            echo $seccion['cod_peri'];
            
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
//                
        }else{
            $data['err'] = "Error cargando asistencia";
        }
    }


        
}
