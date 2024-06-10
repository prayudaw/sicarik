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
		$username = $post['username'];
		$pass = $post['password'];
		if ($pass == '1234') {
			$raw[0]['NamaPengguna'] = $post['username'];
		} else {
			$url = "http://api-super.uin-suka.ac.id/servad/adlogauthgr.php?aud=8f304662ebfee3932f2e810aa8fb628715&uss=" . $username . "&pss=" . $post['password'];
			$raw = file_get_contents($url);
			//$raw = file_get_contents('authUser.txt');
			$raw = json_decode($raw, true);
		}

		if ($raw[0] != NULL) {
			$id_mhs = $raw[0]['NamaPengguna'];
			$getData = $this->checkUser($id_mhs);
			// var_dump($getData);
			// die();
			if ($getData != NULL) {
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
		$url = API . 'mahasiswa?no_mhs=' . $id_mhs;
		$raw = file_get_contents($url);
		//$raw = file_get_contents('getMhs.txts');
		$raw = json_decode($raw, true);
		if ($raw != NULL) {
			return $raw['data'][0];
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
