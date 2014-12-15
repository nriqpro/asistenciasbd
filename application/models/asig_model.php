<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Asig_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
        }
       
       function getAsignaturas(){
            $query = $this->db->query("SELECT * FROM asignatura");
            return $query->result();
       }

       public function addAsignatura($asignatura){
           $query = $this->db->query("INSERT INTO asignatura VALUES (?,?,?,?)",$asignatura);
           return $query;
       }

   }