<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_riwayat');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->M_riwayat->riwayat();
        $page = 'Riwayat Lelang';
        $data = [
            'riwayat' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->M_riwayat->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/riwayat', $data);
        $this->load->view('panitia/partials/end');
    }
}