<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Salon_model extends CI_Model{
        function __construct(){
            parent::__construct();
            
        }
       
       public function getSalones(){
            $query = $this->db->query("SELECT * FROM salon");
            return $query->result();
       }
        public function addSalon($salon){
           $query = $this->db->query("INSERT INTO salon VALUES (?,?)",$salon);
           return $query;
       }
   }

?>