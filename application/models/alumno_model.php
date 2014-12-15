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
       
       public function getAlumnosByCarrera($carrera){
           $query = $this->db->query(
               " SELECT a.ci_est,a.nombre,a.apellido,a.sexo 
                 FROM alumno AS a,carrera AS c, r_alumno_car AS rac
                 WHERE rac.ci_est = a.ci_est
	               AND rac.cod_c = c.cod_c
	               AND c.nombre LIKE '$carrera';"
           );
            return $query->result();
       }
       
       public function getAlumnosBySeccion($seccion){
           $query = $this->db->query(
              "SELECT a.ci_est,a.nombre,a.apellido,a.sexo 
               FROM alumno AS a,seccion AS s, r_seccion_alumno AS rsa
               WHERE rsa.ci_est = a.ci_est
	               AND rsa.cod_seccion = s.cod_seccion
	               AND s.cod_seccion = $seccion;"
           );
            return $query->result();
       }
       
        public function getAlumnosByMateria($materia){
           $query = $this->db->query(
              "SELECT a.ci_est,a.nombre,a.apellido,a.sexo 
              FROM alumno AS a, r_seccion_alumno AS rsa,   (SELECT s.cod_seccion 
                                                            FROM seccion AS s,
                                                                (SELECT asig.cod_asig 
                                                                FROM asignatura AS asig
                                                                WHERE  asig.nombre LIKE '$materia') AS r
                                                            WHERE s.cod_asig = r.cod_asig) AS r
                WHERE rsa.ci_est = a.ci_est
                AND rsa.cod_seccion = r.cod_seccion;"
           );
            return $query->result();
       }

   }