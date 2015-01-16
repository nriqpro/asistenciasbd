<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');
class M_login extends CI_Model  {
    public function __construct()  {
        parent::__construct();
    }
    public function takeUser($username, $password, $status)  {
        $this->db->select('*');  $this->db->from('emails');
        $this->db->where('email', $username);
        $this->db->where('pass', $password);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function userData($username)  {
        $this->db->select('email');
        $this->db->where('email', $username);
        $query = $this->db->get('emails');
        return $query->row();
    }
}
