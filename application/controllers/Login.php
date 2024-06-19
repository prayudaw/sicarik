<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if ($isLoggedIn == TRUE) {
			redirect('dashboard/home');
		}

		$this->load->view('login/view');
	}

	public function auth()
	{
		$post = $this->input->post();
		$username = preg_replace('/\s+/', '', $post['username']);
		$pass = preg_replace('/\s+/', '', $post['password']);
		if ($pass == PASS_PETUGAS) {
			$raw[0]['NamaPengguna'] = $post['username'];
		} else {
			$url = API_SUPER . "&uss=" . $username . "&pss=" . $post['password'];
			$raw = file_get_contents($url);
			//$raw = file_get_contents('authUser.txt');
			$raw = json_decode($raw, true);
		}

		if ($raw[0] != NULL) {
			$id_mhs = $raw[0]['NamaPengguna'];

			$getData = $this->checkUser($id_mhs);
			// var_dump($getData);
			// die();
			if ($getData != 2) {
				$timeout = 2000;
				$sessionArray = array(
					'no_mhs' => $getData['no_mhs'],
					'Fullname' => $getData['nama'],
					'jurusan' => $getData['jurusan'],
					'fakultas' => $getData['fakultas'],
					'angkatan' => $getData['angkatan'],
					'status' => $getData['status'],
					'isLoggedIn' => TRUE,
					'expires_time' => time() + $timeout
				);

				$this->session->set_userdata($sessionArray);
				$response = array(
					'status' => 1,
					'message' => 'Berhasil login',
				);
			} else {
				$response = array(
					'status' => 2,
					'message' => 'Data Tidak Ditemukan',
				);
			}

			echo json_encode($response);
		} else {
			$response = array(
				'status' => 2,
				'message' => 'Username atau Password salah',
			);


			echo json_encode($response);
		}
	}
	public function checkUser($id_mhs)
	{
		$url = API . 'mahasiswa.php?no_mhs=' . $id_mhs;
		$raw = file_get_contents($url);
		//$raw = file_get_contents('getMhs.txts');
		$raw = json_decode($raw, true);
		if ($raw['status'] != 2) {
			return $raw['data'][0];
		}
		return $raw['status'];
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
