<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pemenang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_pemenang');
        $this->load->helper('url');
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
    }

    // Menampilkan Data Pemenang Lelang

    public function index()
    {

        $TampilData = $this->M_pemenang->pemenang();
        $page = 'Pemenang Lelang';
        $data = [
            'PemenangLelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];


        $data['user'] = $this->M_pemenang->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/pemenang', $data);
        $this->load->view('panitia/partials/end');
    }

    // Fungsi Verifikasi Pembayaran

    public function verifikasi($peserta_id)
    {
        $peserta_id = $this->uri->segment(4);
        $data = [
            'status' => $this->input->post('status'),
            'konfirmasi_terimaproduk' => $this->input->post('konfirmasi_terimaproduk')
        ];
        $this->db->where('peserta_id', $peserta_id);
        $this->db->update('lelang_pemenang', $data);
        redirect('panitia/pemenang');
    }

    // Edit Data Status & Konfirmasi Terima Produk 

    public function edit()
    {

        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('konfirmasi_terimaproduk', 'Status Order', 'required');

        if ($this->form_validation->run() == false) {
            redirect('panitia/pemenang/');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->set('konfirmasi_terimaproduk', $this->input->post('konfirmasi_terimaproduk', true));
            $this->db->where('peserta_id');
            $this->db->update('lelang_pemenang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
        }
        redirect('panitia/pemenang/');
    }

    // Update Data Status Pemenang Lelang 
    
    public function detail($id)
    {
        $this->form_validation->set_rules('status', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/pemenang');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang_pemenang');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/pemenang/');
        }
    }

    // Update Data Surat Perintah

    public function update($id)
    {
        $lelangbid = $this->M_suratperintah->suratperintah($id);
        $peserta_id = $lelangbid['peserta_id'];
        $pelelang_id = $lelangbid['pelelang_id'];
        $data = array(

            "lelang_id" => $id,
            "peserta_id" => $peserta_id,
            "pelelang_id" => $pelelang_id,
            "status" => "1"

        );
        $this->db->insert('lelang_pengiriman', $data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Terupdate!</div>');
        redirect('panitia/suratperintah/');
    }

    // Hapus Data Pemenang Lelang

    public function deletepemenang($id)
    {
        $this->M_pemenang->deletepemenang($id);

        redirect('panitia/pemenang');
    }
}
