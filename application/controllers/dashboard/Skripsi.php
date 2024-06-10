<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/core/BaseController.php';

class Skripsi extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->loginCheck();
    }

    public function index()
    {
        $this->load->view('dashboard/skripsi/list');
    }

    public function ajax_list()
    {
        $id_mhs = $this->session->userdata('no_mhs');
        //$id_mhs = '21103080046';
        $url = API . 'transaksi_skripsi?no_mhs=' . $id_mhs . '&length=' . $_POST['length'] . '&start=' . $_POST['start'];
        $list = file_get_contents($url);
        $list = json_decode($list, true);


        //get total
        $url = API . 'transaksi_skripsi?no_mhs=' . $id_mhs;
        $total = file_get_contents($url);
        $total = json_decode($total, true);

        // end get total
        $data = array();
        $no = $_POST['start'];

        foreach ($list['data'] as $getData) {
            $no++;
            $row = array();
            $row[] = $getData['judul'];
            $row[] = $getData['tgl_pinjam'];
            $row[] = $getData['tgl_kembali'];
            //add html for action
            $row[] = '';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => count($total['data']),
            "recordsFiltered" => count($total['data']),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
