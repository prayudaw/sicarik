<?php
class login_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function insert_login_log($data)
    {
        $this->db->insert('log_login', $data);
    }


    public function insert_queue_email($data)
    {
        $this->db->insert('queue_email', $data);
    }

    public function checkQueueEmail($nim) {
        $this->db->from('queue_email');
        $this->db->where('nim',$nim);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getData(){
        $this->db->from('queue_email');
        $this->db->where('status',0);
        $query = $this->db->get();
        //$this->db->limit(1); 
        //echo $this->db->last_query();die();
        return $query->result_array();
    }

    public function updateQueueEmail($nim,$set){
        $this->db->set('buku_telat', $set);
        $this->db->where('nim', $nim);
        $this->db->update('queue_email');
    }

    public function updateQueue($nim,$data){
        $this->db->set($data);
        $this->db->insert('queue_email');  
       
     }
}