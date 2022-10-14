<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelelang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_pelelang');
        $this->load->helper('url');
    }

    // Menampilkan Data Pelelang 

    public function index()
    {

        $TampilData = $this->M_pelelang->pelelang();
        $page = 'Pelelang';
        $data = [
            'pelelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];

        $data['user'] = $this->M_pelelang->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/pelelang', $data);
        $this->load->view('panitia/partials/end');
    }

    // Verifikasi Data Pelelang

    public function verifikasi($pelelang_id)
    {
        $pelelang_id = $this->uri->segment(4);
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->db->where('pelelang_id', $pelelang_id);
        $this->db->update('pelelang', $data);
        redirect('panitia/pelelang');
    }

    // Hapus Data Pelelang

    public function delete($pelelang_id)
    {
        $this->M_pelelang->deletePelelang($pelelang_id);
        redirect('panitia/pelelang');
    }
}
