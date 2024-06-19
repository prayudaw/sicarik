<?php

class Send_email extends CI_Controller
{

    public function index()
    {
        $url = API . 'late_book.php';
        $raw = file_get_contents($url);
        //$raw = file_get_contents('getMhs.txts');
        $raw = json_decode($raw, true);
        $getdata = $raw['data'];

        // var_dump($getdata);
        // die();

        if (!empty($getdata)) {
            foreach ($getdata as $v) {
                $data = array(
                    'nama' => $v['nama'],
                    'buku_telat' => $v['buku_telat'],
                );
                $this->send($data);
            }
        }
    }

    private function send($data = null)
    {

        // var_dump($data);
        // die();

        // set konfigurasi email library
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'prayudawirawan13@gmail.com',
            'smtp_pass' => 'nnhnbatlkqqtqhlt',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
        );

        // load library email
        $this->load->library('email', $config);

        // set email yang akan dikirim
        $this->email->set_newline("\r\n");
        $this->email->from('prayudawirawan13@gmail.com', 'Perpustakaan UIN SUNAN KALIJAGA ');
        $this->email->to('prayudaw@gmail.com');
        $this->email->subject('Denda Terlambat Pengambalian Buku');
        $mesg = $this->load->view('template/email', $data, true);

        $this->email->message($mesg);

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
