<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('email, pass');
   $this -> db -> from('emails');
   $this -> db -> where('email', $username);
   $this -> db -> where('pass', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>
