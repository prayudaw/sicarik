<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/core/BaseController.php';

class Login extends BaseController
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
			// echo "<pre>";
			// print_r($_SERVER);
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

				//insert log login
				$getDataClient = $this->getInfoClient($getData['no_mhs']);

				// var_dump($getDataClient);
				// die();
				$this->insert_log_login($getDataClient);

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


	private function getInfoClient($no_mhs)
	{
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$device = 'Unknown';
		$platform = 'Unknown';
		$bname = 'Unknown';
		$version = "-";

		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if (isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if (isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';


		// first get the platform
		$u_info = preg_split('/[\/();,]/', $_SERVER["HTTP_USER_AGENT"]);
		$platform = $u_info[2] . " " . $u_info[3];

		// next get the device
		$u_info = preg_split('/[\/();,]/', $_SERVER["HTTP_USER_AGENT"]);
		$device = $u_info[4];


		// Next get the name of the useragent yes seperately and for good reason
		if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		} elseif (preg_match('/Firefox/i', $u_agent)) {
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		} elseif (preg_match('/OPR/i', $u_agent)) {
			$bname = 'Opera';
			$ub = "Opera";
		} elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
			$bname = 'Google Chrome';
			$ub = "Chrome";
		} elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
			$bname = 'Apple Safari';
			$ub = "Safari";
		} elseif (preg_match('/Netscape/i', $u_agent)) {
			$bname = 'Netscape';
			$ub = "Netscape";
		} elseif (preg_match('/Edge/i', $u_agent)) {
			$bname = 'Edge';
			$ub = "Edge";
		} elseif (preg_match('/Trident/i', $u_agent)) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		}

		// finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
				$version = $matches['version'][0];
			} else {
				$version = $matches['version'][1];
			}
		} else {
			$version = $matches['version'][0];
		}

		$countryCode = '';
		$isp = '';
		$city = '';
		$query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ipaddress));
		if ($query && $query['status'] == 'success') {
			$countryCode = $query['countryCode'];
			$isp = $query['isp'];
			$city = $query['city'];
		}

		if ($version == null || $version == "") {
			$version = "?";
		}


		// var_dump($bname . " " . $version);
		// die();
		$data = array(
			'is_login' => 1,
			'nim' => $no_mhs,
			'ip' =>  $ipaddress,
			'device' => $device,
			'nameBrowser'      => $bname . " " . $version,
			'platform'  => $platform,
			'countryCode' => $countryCode,
			'isp' => $isp,
			'city' => $city
		);


		return $data;
	}
}
