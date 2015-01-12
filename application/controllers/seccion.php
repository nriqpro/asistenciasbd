<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seccion extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
          $this->load->model('seccion_model');
          $this->load->model('periodo_model');
          $this->load->model('alumno_model');
          $this->load->model('profesor_model');
          $this->load->model('asig_model');
          $this->load->model('periodo_model');
          $this->load->model('salon_model');
    }
    
    public function index(){
        $query = $this->seccion_model->getSecciones();
        $data['seccion'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verSeccion',$data);
        $this->load->view('layouts/footer');
    }

    public function formularioSeccion(){
        $query = $this->profesor_model->getProfesores();
        $data['profesor'] = $query;
        $query = $this->asig_model->getAsignaturas();
        $data['asignaturas'] = $query;
        $query = $this->periodo_model->getPeriodos();
        $data['periodo'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('seccion/form_seccion_view',$data);
        $this->load->view('layouts/footer');
    }
    
    public function addSeccion(){
        $seccion = array(
            'cod_peri' => $this->input->post('cod_peri'),
            'ci_profe' => $this->input->post('ci_profe'),
            'cod_asig'  => $this->input->post('cod_asig'),
        );
        $query = $this->seccion_model->addSeccion($seccion);
        $data['seccion'] = $query;
        
         if($query ==NULL){
            $data['err'] = "Error, asegurese de que los datos esten registrados actualmente.";   
        }
        
        $data['seccion'] = $this->seccion_model->getSecciones();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/verSeccion',$data);
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
    
    public function verHorarioSec(){
        $seccion = array(
            'cod_peri' => $this->input->post('cod_peri'),
            'ci_profe' => $this->input->post('ci_profe'),
            'cod_asig'  => $this->input->post('cod_asig'),
            'cod_seccion'  => $this->input->post('cod_seccion'),
        );
        $data['alumno'] = $this->alumno_model->getAlumnosBySeccion($seccion['cod_seccion']);
        $data['seccion'] = $this->seccion_model->getSeccion($seccion['cod_seccion']);
        $data['salon'] = $this->seccion_model->seccionSalon($seccion['cod_seccion']);
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('seccion/ver_horario_sec',$data);
        $this->load->view('layouts/footer');
    }
    
        
    public function cargarAddSalonSecc(){
         $seccion = array(
            'cod_peri' => $this->input->post('cod_peri'),
            'ci_profe' => $this->input->post('ci_profe'),
            'cod_asig'  => $this->input->post('cod_asig'),
            'cod_seccion'  => $this->input->post('cod_seccion'),
        );    
        $data['seccion'] = $this->seccion_model->getSeccion($seccion['cod_seccion']);
        $data['salon'] = $this->seccion_model->seccionSalon($seccion['cod_seccion']);
        
        $query = $this->salon_model->getSalones();
        
        if($query == NULL){
            $data['err'] = "No existen salones. Cree un salon";
        }else{
            $data['salones'] = $query;
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('seccion/form_salonsecc_view',$data);
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
    
    public function inscribirSecciones(){
        $periodo = $this->periodo_model->getPeriodoActual();
        $variables = $this->input->post();
        
        $i = 0;
        $j = 0;
        $k = 0;
        $variableEspecial = 0;
        $codigoPeriodo;
        $codigoAsignatura;
        $cedulaProfesor;
        $codigoSalon;
        $codigoSeccion = $this->seccion_model->getSiguienteSeccion();
        $horaInicio = array();
        $horaFin = array();
        $dia = array();
        
        foreach($periodo as $loop){
         $codigoPeriodo = $loop->cod_peri;
        }
       foreach($variables as $loop){
           if ($i == 0)
               $cedulaProfesor = $loop;
           if ($i == 1)
               $codigoAsignatura = $loop;
           if ($i == 2)
               $codigoSalon = $loop;
        
           if ($i > 2){
                    
                   if ($k == 0)
                       $horaInicio[$j] = $loop;

                   if($k == 1)
                       $horaFin[$j] = $loop;

                   if ($k == 2){
                       $dia[$j] = $loop;
                       $j++;
                   }
                       
                
                   $k = ($k + 1) % 3;
                   
            }
            $i++;
           }
            $seccion = array(
                'cod_seccion' => $codigoSeccion,
                'cod_peri' => $codigoPeriodo,
                'ci_profe' => $cedulaProfesor,
                'cod_asig'  => $codigoAsignatura
            );
            $r_seccion_salon = array();
            echo "codigoSeccion: ".$codigoSeccion."<br>";
            echo "codigoPeriodo: ".$codigoPeriodo."<br>";
            echo "codigoAsignatura: ".$codigoAsignatura."<br>";
            echo "codigoSalon: ".$codigoSalon."<br>";
            echo "cedulaProfesor: ".$cedulaProfesor."<br>";
        
            for ($i = 0 ; $i < $j ; $i++){
                $r_seccion_salon[$i] = array(
                        'hora_ini' => $horaInicio[$i],
                        'dia' => $dia[$i],
                        'cod_salon'  => $codigoSalon,
                        'cod_seccion' => $codigoSeccion,
                        'hora_fin' => $horaFin[$i]
                );
                 echo "horaInicio ".$horaInicio[$i]."<br>";
                 echo "horaFin: ".$horaFin[$i]."<br>";
                 echo "Dia: ".$dia[$i]."<br>";
            }
        
            $this->seccion_model->addSeccionProfesor($seccion, $r_seccion_salon);
       }
        
    }

