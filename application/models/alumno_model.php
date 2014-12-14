<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Alumno_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
       
       function getAlumnos(){
            $query = $this->db->query("SELECT * FROM alumno");
            return $query->result();
       }

       public function addAlumno($alumno){
           $query = $this->db->query("INSERT INTO alumno VALUES (?,?,?,?,?,?)",$alumno);
           return $query;
       }

   }