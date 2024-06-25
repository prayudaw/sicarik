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
}
