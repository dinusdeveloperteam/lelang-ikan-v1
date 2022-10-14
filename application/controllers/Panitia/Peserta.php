<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_peserta');
        $this->load->helper('url');
    }

    // Menampilkan Data Peserta Lelang

    public function index()
    {
        $TampilData = $this->M_peserta->peserta();
        $page = 'Peserta Lelang';
        $data = [
            'peserta' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];

        $data['user'] = $this->M_peserta->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/peserta', $data);
        $this->load->view('panitia/partials/end');
    }

    // Verifikasi Data Pemenang Lelang

    public function verifikasi($peserta_id)
    {
        $peserta_id = $this->uri->segment(4);
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->db->set('status', $this->input->post('status', true));
        $this->db->where('peserta_id', $peserta_id);
        $this->db->update('peserta', $data);
        redirect('panitia/peserta');
    }


    // Menghapus Data Peserta Lelang

    public function delete($peserta_id)
    {
        $this->M_peserta->deletePeserta($peserta_id);
        redirect('panitia/peserta');
    }
}
