<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/core/BaseController.php';

class Home extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$no_mhs = $this->session->userdata('no_mhs');

		//get data buku yg sedang dipinjam
		$url = API . 'transaksi?no_mhs=' . $no_mhs . '&action=get_is_borrow';
		$list = file_get_contents($url);
		$list = json_decode($list, true);


		//get total transaksi buku
		$total_transaksi_buku = API . 'transaksi?no_mhs=' . $no_mhs . '&action=get_total';
		$total_transaksi_buku = file_get_contents($total_transaksi_buku);

		//get total transaksi skripsi
		$total_transaksi_skripsi = API . 'transaksi_skripsi?no_mhs=' . $no_mhs . '&action=get_total';
		$total_transaksi_skripsi = file_get_contents($total_transaksi_skripsi);
		//echo $total_transaksi_skripsi;die();

		//get total transaksi loker
		$total_transaksi_loker = API . 'loker?no_mhs=' . $no_mhs . '&action=get_total';
		$total_transaksi_loker = file_get_contents($total_transaksi_loker);
		//echo $total_transaksi_skripsi;die();


		$data['jumlah_transaksi_loker'] = $total_transaksi_loker;
		$data['jumlah_transaksi_buku'] = $total_transaksi_buku;
		$data['jumlah_transaksi_skripsi'] = $total_transaksi_skripsi;
		$data['is_borrow'] = $list;

		$this->load->view('dashboard/home', $data);
	}
}
