<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Carrera_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
        }
       
       public function getCarrera($carreras){
           $query = $this->db->query("SELECT * FROM carrera as c where c.nombre like '$carreras';");
            return $query->result();
       }
       
       function getCarreras(){
            $query = $this->db->query("SELECT * FROM carrera");
            return $query->result();
       }
       
       public function addProfesor($profesor){
           $query = $this->db->query("INSERT INTO profesor VALUES (?,?,?,?,?)",$profesor);
           return $query;
       }
       
       public function updateCarrera($carreras){
           $query = $this->db->query("UPDATE carrera SET nombre=? WHERE cod_c=?",$carreras);
            return $query;
       }
   }