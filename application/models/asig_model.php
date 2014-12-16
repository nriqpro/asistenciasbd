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
           $query = $this->db->query("INSERT INTO asignatura VALUES (cod_asig,?,?,?)",$asignatura);
           return $query;
       }
       
       public function getAsig($asignatura){
           $query = $this->db->query(
               " SELECT *
                 FROM asignatura as asig
                 WHERE asig.nombre LIKE '$asignatura';"
           );
            return $query->result();
       }
       
       function updateAsignatura($asignatura){
           $query = $this->db->query("UPDATE asignatura SET nombre=?,uni_cred=?,nro_horas=? WHERE cod_asig=?",$asignatura);
            return $query;
       }

   }