<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Alumno_model');
        $this->load->model('Carrera_model');
    }
    
    public function index(){

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('home_view');
        $this->load->view('layouts/footer');
    }
    
     public function verAlumnos(){
        $this->load->view('layouts/header');
         $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/alumnos_view');
        $this->load->view('layouts/footer');
    }

    public function formularioAlumno(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $data['carreras'] = $this->Carrera_model->getCarreras();
        $this->load->view('admin/alumno/form_alumno_view',$data);
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

        $this->db->trans_start();
        $result = $this->Alumno_model->addAlumno($alumno);
        $this->Carrera_model->add_r_alumno_car($this->input->post('carrera'),$alumno['cedula']);
        $this->db->trans_complete();
        $this->verAlumnos();
    }
    
    public function editarAlumno(){
        $cedula = $this->input->post("cedula");
        $alumno = $this->Alumno_model->getAlumno($cedula);
        
//        foreach ($alumno as $a){
//          echo   $a->ci_est."<br>";
//           echo $a->nombre." ".$a->apellido."<br>";
//          echo  $a->f_nac."<br>";
//          echo  $a->sexo."<br>";
//          echo  $a->direc."<br>";
//        }
//        
       // echo $cedula;
        $data['alumno'] = $alumno;
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/form_edit_alumno',$data);
        $this->load->view('layouts/footer');
        
    }
    
    public function updateAlumno(){
           $alumno = array(
            
            'nombre' => $this->input->post('nombre'),
            'sexo' => $this->input->post('sexo'),
            'direccion' => $this->input->post('direccion'),
            'apellido' => $this->input->post('apellido'),
             'cedula' => $this->input->post('cedula')
        );
        
        $this->Alumno_model->updateAlumno($alumno);
        $this->verAlumnos();
    }
    public function gestionAlumno(){
        $cedula = $this->input->post('cedula');

        $alumno = $this->Alumno_model->getAlumno($cedula);
        if ($alumno)
            
            $data['alumno'] = $alumno;
        else
           $data['err'] = "Alumno no encontrado";
            
        $data['secciones'] = $this->Alumno_model->getInfoSecciones($cedula);
       
        $incritas = $this->Alumno_model->getSeccionesInscritasPeriodoActual($cedula);
        if ($incritas!=null){
            $data['inscrita'] = $incritas;
            
        }
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/gestionAlumno_view',$data);
        $this->load->view('layouts/footer');
    }

    public function buscarAlumnos(){
        $tipo = $this->input->post('tipo');
        $contenido = $this->input->post('contenido');
        $err=null;
        
        if (strcasecmp($tipo,"Carrera")==0)
            $data['alumnos'] = $this->Alumno_model->getAlumnosByCarrera($contenido);
           else if(strcasecmp($tipo,"Materia")==0)
                $data['alumnos'] = $this->Alumno_model->getAlumnosByMateria($contenido);         
                else if(strcasecmp($tipo,"Seccion")==0) 
                    $data['alumnos'] = $this->Alumno_model->getAlumnosBySeccion($contenido);
                
        
        if ($data['alumnos']==null)
                $data['err']="Alumno no Encontrado";
       /* foreach($data['alumnos'] as $alumno){
            echo $alumno->nombre."<br>";
            }*/
                
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/alumnos_view',$data);
        $this->load->view('layouts/footer');
    }
    
    public function verHorarioAlumno(){
       //  $this->load->view('layouts/header');
        $alumno = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
        );
        $data['alumno'] = $alumno;
        $data['infoSecciones']= $this->Alumno_model->getInfoSecciones($alumno['cedula']);
        $data['horario'] = $this->Alumno_model->getHorarioAlumno($alumno['cedula']);
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/horario_view',$data);
        $this->load->view('layouts/footer');
    }
    
    public function inscribirMaterias(){
         $alumno = array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
        );
        $data['alumno'] = $alumno;
        $infoSecciones = $this->Alumno_model->getSeccionesCarrera($alumno['cedula']);
        $data['infoSecciones'] = $infoSecciones;
        $horarios = array();
        $i = 0;
        foreach ($infoSecciones as $loop){
      //          echo "asignatura: ".$loop->asignatura."<br>";
                $horarios[$i++]=$this->Alumno_model->getHorarioSeccion($loop->cod_seccion);
        }
//        $i = 0;
//        
//        foreach ($horarios as $loop){
//            echo "SECCION (".$i++.")<br>";
//                foreach ($loop as $h){
//                    echo $h->cod_seccion." ".$h->dia." ".$h->hora_ini." ".$h->hora_fin." ".$h->cod_salon."<br>";
//                }
//        }
        $data['horarios'] = $horarios;
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/inscribir_materias_view',$data);
        $this->load->view('layouts/footer');
    
    }
    
    public function inscribirSeccionesBD(){

        $variables = $this->input->post();
        $i = 0;
       foreach($variables as $loop){
        if ($i == 0 )
            $cedula = $loop;
        if ($i>1)
             $horarios[$i++]=$this->Alumno_model->addSecciones($cedula,$loop);
           $i++;
       }
        if ($i ==2)
            echo "No se recibio ninguna materia";
        
        
    }
}

?>
