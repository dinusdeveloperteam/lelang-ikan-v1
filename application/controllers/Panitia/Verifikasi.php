<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia');
        $this->load->helper('url');
    }
    public function index()
    {

        //$TampilData = $this->Panitia->pembukaanlelang();
        $page = 'Verifikasi Pemenang Lelang';
        $data = [
            //'pelelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
        $data['user'] = $this->Panitia->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/verifikasipemenang', $data);
        $this->load->view('panitia/partials/end');
    
    }
}