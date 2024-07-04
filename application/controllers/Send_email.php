<?php

class Send_email extends CI_Controller
{    

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {  
        $url = API . 'late_book.php';
        $raw = file_get_contents($url);
        //$raw = file_get_contents('getMhs.txts');
        $raw = json_decode($raw, true);
        $getdata = $raw['data'];
        //echo count($getdata);die();
        //var_dump($getdata[0]['buku_telat']);die();

        if (!empty($getdata)) {
            foreach ($getdata as $v) {
                $check_data_antrian=$this->login_model->checkQueueEmail($v['no_mhs']);
                $check_status_kirim =$this->login_model->getStatus($v['no_mhs']);

                if($check_data_antrian ==  0 ){
                    $data = array(
                        'nama' => $v['nama'],
                        'nim' => $v['no_mhs'],
                        'email' => $this->getEmail($v['no_mhs']),
                        'buku_telat' => json_encode($v['buku_telat']),
                        'status' => 0
                    );
                    //var_dump($data);die();
                    $insert = $this->login_model->insert_queue_email($data);
                }

                //var_dump($check_status_kirim['status']);die();
                if($check_data_antrian ==  1 && $check_status_kirim['status'] == 1  ){
                    $data = array(
                        'buku_telat' =>json_encode($v['buku_telat']),
                        'status'=>0
                     );
                     $update =$this->login_model->updateQueue($v['no_mhs'],$data );                 
                }
    
                //$this->send($data);
            }
        }
    }

    private function getEmail($nim){    
        // var_dump($nim);die();
            if(strpos($nim,'-DP')){
               $nim=str_replace('-DP','',$nim);
            }       
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.uin-suka.ac.id/akademik/v2/getMahasiswa',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'data_search=a.NIM%3D\''.$nim.'\'',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJJc3N1ZXIgb2YgdGhlIEpXVCIsImF1ZCI6IkF1ZGllbmNlIHRoYXQgdGhlIEpXVCIsInN1YiI6IlN1YmplY3Qgb2YgdGhlIEpXVCIsImlhdCI6MTcyMDA3OTAwMywiZXhwIjoxNzIwMDgyNjAzLCJuaXAiOiJBQ0MuQVBJLlBFUlBVUyIsIm5hbWEiOiJBQ0MgUEVSUFVTIiwiYWtzZXMiOiJBUElBS0QuUC5NSFMuUiJ9.10HtP_MBlfhjsgHOq6VGfZ9oVFzy39ouiwNAPTHSKnQ'
            ),
            ));
            $response = curl_exec($curl);
            $response = json_decode($response,TRUE);
            curl_close($curl);
            $email_address='error';
            if($response !== NULL)
            {   
                //var_dump($response['data'][0]['EMAIL_MHS']);die();
                $email_address= $response['data'][0]['EMAIL_MHS'];
            }
            return $email_address;        
    }
    

    public function send()
    {
        $data_queue=$this->login_model->getData();    
        foreach ($data_queue as $v) {

             $data = array(
                'nama' => $v['nama'],
                'buku_telat' => json_decode($v['buku_telat'],true),
            );

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
            $this->email->from('prayudawirawan13@gmail.com', 'Perpustakaan UIN SUNAN KALIJAGA');
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
                $data = array(
                    'status'=>1
                 );
                 $update =$this->login_model->updateQueue($v['nim'],$data);
            }
        }

      
    }


    

}
