<?php 

class login_model extends CI_model
{
   public function insert_login_log($data){
    $this->db->insert('logsicarik',$data);
   }

    
}
