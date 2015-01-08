<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
<<<<<<< HEAD
   class seccion_model extends CI_Model{
=======
   class Seccion_model extends CI_Model{
>>>>>>> secciones a ver
        function __construct(){
            parent::__construct();
           
            
        }
       
<<<<<<< HEAD
       public function getSeccion($seccion){
           $query = $this->db->query("SELECT  sec.cod_seccion, sec.cod_peri, sec.ci_profe, p.nombre, p.apellido, 
                                        sec.cod_asig, asig.nombre as asig
                                        FROM seccion as sec, asignatura as asig, profesor as p  
                                        WHERE p.ci_profe = sec.ci_profe and asig.cod_asig = sec.cod_asig and
                                        sec.cod_seccion=?",$seccion);
            return $query->result();
       }
       
       function getSecciones(){
            $query = $this->db->query("SELECT  sec.cod_seccion, sec.cod_peri, sec.ci_profe, p.nombre, p.apellido, sec.cod_asig, asig.nombre as asig
                                        FROM seccion as sec, asignatura as asig, profesor as p 
                                        WHERE sec.cod_asig = asig.cod_asig and p.ci_profe = sec.ci_profe");
            return $query->result();
       }
       
       public function addSeccion($seccion){
           $query = $this->db->query("INSERT INTO seccion VALUES (?,?,?,?)",$seccion);
           return $query;
       }
       
       public function getSecByProfe($contenido){
          $query = $this->db->query(
               " SELECT p.ci_profe,p.nombre,p.apellido, s.cod_seccion, s.cod_peri, a.cod_asig, a.nombre as asig
                 FROM profesor as p, seccion as s, asignatura as a
                 WHERE p.ci_profe = s.ci_profe
	               AND s.cod_asig = a.cod_asig
	               AND  p.ci_profe=?",$contenido
           );    
            return $query->result();
       }
       public function getSecByAsig($contenido){
          $query = $this->db->query(
               " SELECT p.ci_profe,p.nombre,p.apellido, s.cod_seccion, s.cod_peri, s.cod_asig, a.nombre as asig
                 FROM profesor as p, seccion as s, asignatura as a
                 WHERE p.ci_profe = s.ci_profe
	               AND s.cod_asig = a.cod_asig
	               AND  a.nombre LIKE '$contenido';"
           );    
            return $query->result();
       }
        public function getSecByPeriodo($contenido){
          $query = $this->db->query(
               " SELECT p.ci_profe,p.nombre,p.apellido, s.cod_seccion, s.cod_peri, s.cod_asig, a.nombre as asig
                 FROM profesor as p, seccion as s, asignatura as a
                 WHERE p.ci_profe = s.ci_profe
	               AND s.cod_asig = a.cod_asig
	               AND s.cod_peri = ?",$contenido
           );    
            return $query->result();
       }
       public function updateSeccion($seccion){
           $db_debug = $this->db->db_debug; //save setting

           $this->db->db_debug = FALSE; 
           $query = $this->db->query("UPDATE seccion SET cod_peri=?,ci_profe=?, cod_asig=? WHERE cod_seccion=?",$seccion);

           $this->db->db_debug = $db_debug;
           
            return $query;
       }
=======
       function getSecciones(){
            $query = $this->db->query(" SELECT sec.cod_seccion,sec.cod_peri,p.nombre,p.apellido,asig.nombre AS asignatura
                                        FROM seccion AS sec, profesor AS p, asignatura AS asig
                                        WHERE sec.ci_profe = p.ci_profe
	                                    AND sec.cod_asig = asig.cod_asig;");
            return $query->result();
       }

      

>>>>>>> secciones a ver
   }