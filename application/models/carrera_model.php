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
       
       public function addCarrera($carreras){
           $query = $this->db->query("INSERT INTO carrera VALUES (cod_c,?)",$carreras);
           return $query;
       }
       
       public function addAsig($carreras, $asig){
           $query = $this->db->query("INSERT INTO r_asig_carrera VALUES ('$carreras','$asig')");
           return $query;
       }

       public function getAsig($carreras){
            $query = $this->db->query("SELECT a.nombre, a.uni_cred, a.nro_horas
                                    FROM asignatura AS a, r_asig_carrera as rsc
                                    WHERE a.cod_asig =rsc.cod_asig
                                        AND rsc.cod_c=?",$carreras);
           return $query->result();
       }

       public function getAsigNot($carreras){
            $query = $this->db->query("SELECT a.cod_asig, a.nombre
                                    FROM asignatura AS a
                                    WHERE a.cod_asig NOT IN
                                    (SELECT rsc.cod_asig FROM r_asig_carrera AS rsc WHERE rsc.cod_c=?)",$carreras);
           return $query->result();
       }
       public function updateCarrera($carreras){
           $query = $this->db->query("UPDATE carrera SET nombre=? WHERE cod_c=?",$carreras);
            return $query;
       }
       public function add_r_alumno_car($carrera,$alumno){
           $query = $this->db->query("INSERT INTO r_alumno_car VALUES ($carrera,$alumno)");
           return $query;
       }
   }
