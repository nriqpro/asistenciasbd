<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
       $this->load->model('user');
       $this->load->model('profesor_model');
       $this->load->model('alumno_model');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $this->session->userdata('username');
     $ci = $this->user->getNombre($this->session->userdata('username'));

    foreach($ci as $loop){
     $ciprofe = $this->profesor_model->getProfesor($loop->ci);
     $cial = $this->alumno_model->getAlumno($loop->ci);
      }
     if($ciprofe !=NULL){
         $data['ci'] = $ciprofe;
         $this->load->view("layouts/header");
         $this->load->view("profesor/sidebar");
        $this->load->view('home_view', $data);
        $this->load->view("layouts/footer");
     }
     if($cial != NULL){
         $data['ci'] = $cial;
         $this->load->view("layouts/header");
//         $this->load->view("profesor/sidebar");
        $this->load->view('home_view', $data);
        $this->load->view("layouts/footer");
     }

   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>
