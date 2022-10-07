<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_deposit');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->M_deposit->deposit();
        $page = 'Verifikasi Peserta Deposit';
        $data = [
            'peserta_deposit' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->M_deposit->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/peserta_deposit', $data);
        $this->load->view('panitia/partials/end');
    }

    //Fungsi Edit
    public function edit($id)
    {
        $id = $this->uri->segment(4);
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->db->where('peserta_deposit', $id);
        $this->db->update('peserta_deposit', $data);
        redirect('panitia/deposit');
    }
    // //Fungsi Delete
    // public function hapusPelelang($id)
    // {
    //     $this->Panitia->hapusDataPelelang($id);
    //     redirect('panitia/pelelang');
    // }
}
