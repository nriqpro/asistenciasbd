<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alumno extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Alumno_model');
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
        $this->load->view('admin/alumno/form_alumno_view');
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
    }
    
    public function gestionAlumno(){
        $cedula = $this->input->post('cedula');


        $data['alumno'] = $this->Alumno_model->getAlumno($cedula);
        $data['secciones'] = $this->Alumno_model->getInfoSecciones($cedula);

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/alumno/gestionAlumno_view',$data);
        $this->load->view('layouts/footer');
    }

    public function buscarAlumnos(){
        $tipo = $this->input->post('tipo');
        $contenido = $this->input->post('contenido');
        
        if (strcasecmp($tipo,"Carrera")==0)
            $data['alumnos'] = $this->Alumno_model->getAlumnosByCarrera($contenido);
            else if(strcasecmp($tipo,"Materia")==0)
                $data['alumnos'] = $this->Alumno_model->getAlumnosByMateria($contenido);
                else if(strcasecmp($tipo,"Seccion")==0) 
                    $data['alumnos'] = $this->Alumno_model->getAlumnosBySeccion($contenido);
        
        
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
}

?>
