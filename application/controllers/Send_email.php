<?php

class Send_email extends CI_Controller
{

    public function index()
    {
        $url = API . 'late_book.php';
		$raw = file_get_contents($url);
		//$raw = file_get_contents('getMhs.txts');
		$raw = json_decode($raw, true);
        $data=$raw['data'];
        
         if(!empty($data)){
            foreach ($data as $v) {
                $this->send();
            }
         }         
    }

    private function send() {
            // set konfigurasi email library
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'prayudawirawan13@gmail.com',
                'smtp_pass' => 'nnhnbatlkqqtqhlt',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
    
            // load library email
            $this->load->library('email', $config);
    
            // set email yang akan dikirim
            $this->email->set_newline("\r\n");
            $this->email->from('prayudawirawan13@gmail.com', 'Adminnya ');
            $this->email->to('myazid9@gmail.com');
            $this->email->subject('Percobaan email');
            $this->email->message('Halo Kak! Ini adalah email percobaan untuk Tutorial CodeIgniter: Mengirim Email via Gmail SMTP menggunakan Email Library CodeIgniter @ qadrlabs.com');
    
            // proses kirim email
            if (!$this->email->send()) {
                // tampilkan error, ketika gagal kirim email
                show_error($this->email->print_debugger());
            } else {
                // tampilkan keterangan sukses kirim email
                echo 'Success to send email';
            }

    }
    
}
