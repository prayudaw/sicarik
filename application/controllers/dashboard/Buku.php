<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/core/BaseController.php';

class Buku extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->loginCheck();
    }

    public function index()
    {
        $this->load->view('dashboard/buku/list');
    }

    public function ajax_list()
    {
        $id_mhs = $this->session->userdata('no_mhs');
        //$id_mhs = '22101020056';

        $url = API . 'transaksi.php';
        $postdata = http_build_query(
            array(
                'no_mhs' =>  $id_mhs,
                'length' => $_POST['length'],
                'start' => $_POST['start'],
                'search' => $_POST['search']['value']
            )
        );

        $opts = array(
            'http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);
        $list = file_get_contents($url, false, $context);
        // var_dump($list);
        // die();

        $list = json_decode($list, true);

        $data = array();
        $no = $_POST['start'];

        foreach ($list['data'] as $getData) {
            $no++;
            $row = array();
            $row[] = $getData['judul'];
            $row[] = $getData['tgl_pinjam'];
            $row[] = $getData['tgl_kembali'];
            if ($getData['tgl_dikembalikan'] == '0000-00-00') {
                $row[] = 'Belum Dikembalikan';
            } else {
                $row[] = $getData['tgl_dikembalikan'];
            }
            //add html for action
            $row[] = '';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $list['total_data'],
            "recordsFiltered" => $list['total_filtered'],
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
