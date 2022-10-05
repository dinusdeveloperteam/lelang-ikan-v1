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
        $this->form_validation->set_rules('status', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/deposit/');
            return false;
        } else {
            $this->db->set('status', $this->input->post('status', true));
            $this->db->where('peserta_id', $id);
            $this->db->update('peserta_deposit');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/deposit/');
        }
    }

    // Fungsi Delete

    public function delete($peserta_id)
    {
        $this->M_deposit->delete($peserta_id);
        redirect('panitia/deposit/');
    }
}
