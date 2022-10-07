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

    //Fungsi Edit
    public function edit($id)
    {
        $id = $this->uri->segment(4);
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->db->where('pelelang_id', $id);
        $this->db->update('pelelang', $data);
        redirect('panitia/pelelang');
    }
    //Fungsi Delete
    public function hapusPelelang($id)
    {
        $this->Panitia->hapusDataPelelang($id);
        redirect('panitia/pelelang');
    }
}
