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
                if($check_data_antrian ==  1 && $check_status_kirim['status'] == 1 &&  $v['tgl_dikembalikan'] == '0000-00-00' ){
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

    private function getToken(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => API_GET_TOKEN,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "nip":"ACC.API.PERPUS",
            "password":"95233554"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
  
        $response=json_decode($response,true);
        //var_dump($response["data"]['token']);die(); 
        $token='';
        if($response['error_status'] == 0){
            $token=$response["data"]['token'];
        }
        return $token;            
    }

    private function getEmail($nim){    
        // var_dump($nim);die();
            if(strpos($nim,'-DP')){
               $nim=str_replace('-DP','',$nim);
            } 
            $getToken=$this->getToken();
 
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => API_SUPER_MAHASISWA,
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
                'Authorization: Bearer '.$getToken.''
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
                if($email_address == null){
                     $email_address = $nim.'@student.uin-suka.ac.id';
                }
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
            // $this->email->to('199110050000001201@uin-suka.ac.id');
            $this->email->subject('Denda Terlambat Pengambalian Buku');
            $mesg = $this->load->view('template/email', $data, true);

            $this->email->message($mesg);
            
            // proses kirim email
            if (!$this->email->send()) {
                // tampilkan error, ketika gagal kirim email

                //show_error($this->email->print_debugger());
                $data = array(
                    'status'=>0,
                    'keterangan'=>$this->email->print_debugger()
                 );
                $update =$this->login_model->updateQueue($v['nim'],$data);
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
