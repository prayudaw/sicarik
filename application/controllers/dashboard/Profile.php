<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/core/BaseController.php';

class Profile extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->loginCheck();
    }

    public function index()
    {
        $id_mhs = $this->session->userdata('no_mhs');
        $data['img'] = base_url('assets/img/perpus/uin_default.png');
        // $data['img'] = $this->getImage($id_mhs);
        $this->load->view('dashboard/profile', $data);
    }

    private function getImage($nim)
    {
        //get image mahasiswa from api
        $url = 'http://siprus.uin-suka.ac.id/realtime/b/a.php?nim=' . $nim . '';
        $html = file_get_contents($url);

        $doc = new DOMDocument();
        $img = base_url('assets/img/perpus/uin_default.png');
        @$doc->loadHTML($html);
        $tags = $doc->getElementsByTagName('img');
        foreach ($tags as $tag) {
            $img = $tag->getAttribute('src');
        }
        return $img;
    }
}
