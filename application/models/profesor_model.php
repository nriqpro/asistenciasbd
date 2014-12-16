<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Profesor_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
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
           $this->db->trans_start();
//           $this->db->trans_begin();
           $query = $this->db->query("UPDATE profesor SET ci_profe=?,nombre=?,apellido=?,sexo=?, direc=? WHERE ci_profe=?",$profesor);
           $this->db->trans_complete(); 
           if ($this->db->trans_status() === FALSE){
//                $this->db->trans_rollback();
               echo "Error actualizando";
           }
           $this->db->trans_off();
            return $query;
       }
   }