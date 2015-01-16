<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');
class Login extends CI_Controller  {
    public function __construct()  {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library(array('form_validation','session'));
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()  {
        $session = $this->session->userdata('isLogin');
        if($session == FALSE)  {
            redirect('login/login_form');
        }else  {
            redirect('home');
        }
    }

    public function login_form()  {
//        $this->form_validation->set_rules('email', 'Username', 'required');
//        $this->form_validation->set_rules('pass', 'Password', 'required');
//        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
//        if($this->form_validation->run()==FALSE)  {
//            $this->load->view('layouts/header');
//            $this->load->view('form_login');
//            $this->load->view('layouts/footer');
//        }else  {
            $username = $this->input->post('email');
            $password = $this->input->post('pass');
            $cek = $this->m_login->takeUser($username, $password, 1);
            if($cek <> 0)  {
                $this->session->set_userdata('isLogin', TRUE);
                $this->session->set_userdata('username',$username);
                redirect('home');
            }else  {
                echo " <script>  alert('Failed Login: Check your username and password!');  history.go(-1);  </script>";
            }
//        }
    }

    public function logout()  {  $this->session->sess_destroy();  redirect('login/login_form');  }
}

?>
