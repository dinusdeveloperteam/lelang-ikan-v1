<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pembukaanlelang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_pembukaanlelang');
        $this->load->helper('url');
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
    }
    public function index()
    {

        $TampilData = $this->M_pembukaanlelang->pembukaanLelang();
        $page = 'Pembukaan Lelang';
        $data = [
            'pembukaanlelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];


        $data['user'] = $this->M_pembukaanlelang->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/pembukaanlelang', $data);
        $this->load->view('panitia/partials/end');
    }


    //Fungsi Delete
    public function delete($lelang_id)
    {
        $this->M_pembukaanlelang->deletePembukaanLelang($lelang_id);

        redirect('panitia/pembukaanlelang');
    }

    //Fungsi Edit
    public function edit()
    {

        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('konfirmasi_terimaproduk', 'Status Order', 'required');

        if ($this->form_validation->run() == false) {
            redirect('panitia/pembukaanlelang/');
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('peserta_id');
            $this->db->update('lelang_bid');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
        }
        redirect('panitia/pembukaanlelang/');
    }

    public function detail()
    {

        $id = $this->uri->segment(4);
        $TampilData = $this->M_pembukaanlelang->calonpemenangByLelang($id);
        $maxhargatawar = $this->M_pembukaanlelang->Getmaxhargatawar($id);
        $page = 'List Penawaran Dan Calon Pemenang';
        $lelang = $this->M_pembukaanlelang->getById($id);
        $data = [
            'penawaranlelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page,
            'lelang' => $lelang,
            'maxhargatawar' => $maxhargatawar
        ];


        $data['user'] = $this->M_pembukaanlelang->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/penawaranlelang', $data);
        $this->load->view('panitia/partials/end');
    }


    // update status
    public function update($id)
    {
        $lelangbid = $this->M_pembukaanlelang->calonpemenangByLelanglimit1($id);
        $peserta_id = $lelangbid['peserta_id'];
        $data = array(

            "lelang_id" => $id,
            "peserta_id" => $peserta_id,
            "tgl_diumumkan" => date('Y-m-d h:i:s'),
            "status" => "0",
            "konfirmasi_terimaproduk" => "0"
        );
        $this->db->insert('lelang_pemenang', $data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Data Terupdate!</div>');
        redirect('panitia/pemenang/');
    }
}
