<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Periodo_model extends CI_Model{
        function __construct(){
            parent::__construct();
           
            
        }
       
       function getPeriodos(){
            $query = $this->db->query("SELECT * FROM periodo");
            return $query->result();
       }

       public function addPeriodo($periodo){
           $query = $this->db->query("INSERT INTO periodo VALUES (?,?,?)",$periodo);
           return $query;
       }
       
       public function getPeriodo($periodo){
           $query = $this->db->query(
               " SELECT *
                 FROM periodo as p
                 WHERE p.cod_peri LIKE '$periodo';"
           );
            return $query->result();
       }
       
       function updatePeriodo($periodo){
           $db_debug = $this->db->db_debug; //save setting

           $this->db->db_debug = FALSE; //disable debugging for queries
        $query = $this->db->query("UPDATE periodo SET inicio=?,fin=?,cod_peri=? WHERE cod_peri=?",$periodo);
           $this->db->db_debug = $db_debug; //restore setting
       
            return $query;
       }
       
       public function getPeriodoActual(){
            $query = $this->db->query(
                " SELECT peri.cod_peri 
                  FROM periodo AS peri
                  ORDER BY peri.inicio DESC LIMIT 1;"
           );
            return $query->result();
      
    
       }

   }