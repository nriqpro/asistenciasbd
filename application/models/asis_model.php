<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class asis_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
        }
       
       public function getAsis($asis){
           $query = $this->db->query("SELECT * from asisSeccion as ass where ass.cod_asis=? ORDER BY ass.fecha",$asis);
            return $query->result();
       }
       
       public function getAsisSecc($asis){
           $query = $this->db->query("SELECT * from asisSeccion as ass where ass.cod_seccion=? ORDER BY ass.fecha",$asis);
            return $query->result();
       }

       function getAsist(){
            $query = $this->db->query("SELECT * from Asistencias as asis");
            return $query->result();
       }
       
       public function addAsis($asis){
           $query = $this->db->query("INSERT INTO asistencias VALUES (cod_asis,?,?,?)",$asis);
           return $query;
       }
       
       public function addAsisAlumno($asis, $cod){
            $this->db->trans_start();
           $query = $this->db->query("INSERT INTO r_asis_alumnos VALUES ('$asis','$cod')");
            $this->db->query("UPDATE asistencias SET cargada=1 WHERE cod_asis='$cod'");
            $this->db->trans_complete();
           return $query;
       }
       
       
       public function asisAlumnos($asis){
            $query = $this->db->query("SELECT raa.ci_est, a.nombre, a.apellido, ass.fecha 
                                    FROM r_asis_alumnos AS raa, asisSeccion AS ass, alumno AS a
                                    WHERE raa.cod_asis = ass.cod_asis AND a.ci_est = raa.ci_est AND ass.cod_seccion=? AND ass.cod_asis =?",$asis);
            return $query->result();       
       }
       
       public function inasistentes($asis){
               $query = $this->db->query("SELECT todos.ci_est, todos.nombre, todos.apellido
			FROM (SELECT rsa.ci_est, a.nombre, a.apellido
				FROM r_seccion_alumno AS rsa, alumno as a
				WHERE a.ci_est = rsa.ci_est AND rsa.cod_seccion =?) AS todos
				
			LEFT JOIN 	(SELECT raa.ci_est
					FROM r_asis_alumnos AS raa,asistencias AS asis
					WHERE raa.cod_asis = asis.cod_asis
                        AND asis.cod_asis = ?
                        AND asis.cod_seccion = ?
						AND asis.fecha = ?
						) AS asistentes
			ON asistentes.ci_est = todos.ci_est
			WHERE asistentes.ci_est IS NULL",$asis);
            return $query->result();        
           
       }
       public function updateAsis($asis){
           $db_debug = $this->db->db_debug; //save setting

           $this->db->db_debug = FALSE; 
           $query = $this->db->query("UPDATE asistencias SET cod_seccion=?,fecha=? WHERE cod_asis=?",$asis);

           $this->db->db_debug = $db_debug;
           
            return $query;
       }
       
   }
