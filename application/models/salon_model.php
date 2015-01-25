<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Salon_model extends CI_Model{
        function __construct(){
            parent::__construct();

        }

       public function getSalones(){
            $query = $this->db->query("SELECT * FROM salon");
            return $query->result();
       }
       public function getSalon($cod_salon){
            $query = $this->db->query("SELECT * FROM salon WHERE cod_salon = $cod_salon");
            return $query->result();
       }
        public function addSalon($salon){
           $query = $this->db->query("INSERT INTO salon VALUES (?,?)",$salon);
           return $query;
       }
       
        public function updateSalon($salon){
           $query = $this->db->query("UPDATE salon SET capacidad=? WHERE cod_salon=RPAD(?,5,\"\");",$salon);
           return $query;
       }
   }

?>
