<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Profesor_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
        }
       
       public function getProfesor($profesor){
           $query = $this->db->query("SELECT * FROM profesor where profesor.ci_profe=?",$profesor);
            return $query->result();
       }
       
       function getProfesores(){
            $query = $this->db->query("SELECT * FROM profesor");
            return $query->result();
       }
       
       public function addProfesor($profesor){
           $query = $this->db->query("INSERT INTO profesor VALUES (?,?,?,?,?)",$profesor);
           return $query;
       }
       
       public function updateProfesor($profesor){
           $db_debug = $this->db->db_debug; //save setting

           $this->db->db_debug = FALSE; 
           $query = $this->db->query("UPDATE profesor SET nombre=?,apellido=?,sexo=?, direc=? WHERE ci_profe=?",$profesor);

//           if($data['error'] = $this->db->_error_message("Error"));

           $this->db->db_debug = $db_debug;
           
            return $query;
       }
   }