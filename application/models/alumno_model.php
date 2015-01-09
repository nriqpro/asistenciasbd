<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Alumno_model extends CI_Model{
        function __construct(){
            parent::__construct();
            
        }
       
       public function getAlumnos(){
            $query = $this->db->query("SELECT * FROM alumno");
            return $query->result();
       }

       public function addAlumno($alumno){
           $query = $this->db->query("INSERT INTO alumno VALUES (?,?,?,?,?,?)",$alumno);
           return $query;
       }
       public function getAlumno($cedula){
            $query = $this->db->query("SELECT * FROM alumno AS a WHERE a.ci_est =$cedula;");
           return $query->result();
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

       public function getInfoSecciones($cedula){
           $query = $this->db->query("
              SELECT asig.nombre AS asignatura, p.nombre,p.apellido,p.ci_profe,secciones.cod_seccion
              FROM asignatura AS asig, profesor AS p,
	               (SELECT sec.cod_seccion ,sec.cod_asig,sec.ci_profe
                    FROM r_seccion_alumno AS rsa,seccion AS sec,
                            (SELECT p.cod_peri
                            FROM periodo AS p
                            ORDER BY p.inicio DESC LIMIT 1) AS p_actual
	                WHERE rsa.ci_est = $cedula
                    AND rsa.cod_seccion = sec.cod_seccion
                    AND sec.cod_peri = p_actual.cod_peri) AS secciones
              WHERE secciones.cod_asig = asig.cod_asig
	          AND secciones.ci_profe = p.ci_profe;"
           );
            return $query->result();
       }

       public function getHorarioAlumno($cedula){
             $query = $this->db->query("
                SELECT rss.cod_salon,rss.dia,rss.hora_ini,rss.hora_fin,asig.nombre
                FROM r_seccion_salon AS rss, asignatura AS asig,
                    (SELECT sec.cod_seccion ,sec.cod_asig,sec.ci_profe
                     FROM r_seccion_alumno AS rsa,seccion AS sec,
                                    (SELECT p.cod_peri
                                    FROM periodo AS p
                                    ORDER BY p.inicio DESC LIMIT 1) AS p_actual
                     WHERE rsa.ci_est = $cedula
                            AND rsa.cod_seccion = sec.cod_seccion
                            AND sec.cod_peri = p_actual.cod_peri) AS secciones
                WHERE secciones.cod_seccion = rss.cod_seccion
                    AND secciones.cod_asig = asig.cod_asig
                ORDER BY rss.dia DESC;"

           );
            return $query->result();
       }
       
       public function getSeccionesCarrera($cedula){
            $query = $this->db->query("
               SELECT DISTINCT hc.cod_seccion ,hc.asignatura,hc.uni_cred,hc.nombre,hc.apellido
               FROM horarios_carreras AS hc, r_alumno_car AS rac, carrera AS car
               WHERE hc.carrera = car.nombre
                    AND car.cod_c = rac.cod_c
                    AND rac.ci_est = $cedula
                    ORDER BY hc.cod_seccion ASC;"
              
             );
            return $query->result();    
       }
       
       public function getHorarioSeccion($seccion){
        $query = $this->db->query("
              SELECT DISTINCT hc.cod_seccion,hc.dia,hc.hora_ini,hc.hora_fin,hc.cod_salon 
              FROM horarios_carreras AS hc 
              WHERE hc.cod_seccion = $seccion
              ORDER BY hc.dia DESC;"
              
        );
        return $query->result();  
       }
       
       
       public function addSecciones($cedula,$seccion){
           $array = array(0,$cedula,$seccion);
            $query = $this->db->query("INSERT INTO r_seccion_alumno VALUES (?,?,?)",$array);
    
           return $query;  
       }

   }
