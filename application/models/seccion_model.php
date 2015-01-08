<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Seccion_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
        }
       
       function getSecciones(){
            $query = $this->db->query(" SELECT sec.cod_seccion,sec.cod_peri,p.nombre,p.apellido,asig.nombre AS asignatura
                                        FROM seccion AS sec, profesor AS p, asignatura AS asig
                                        WHERE sec.ci_profe = p.ci_profe
	                                    AND sec.cod_asig = asig.cod_asig;");
            return $query->result();
       }

      

   }