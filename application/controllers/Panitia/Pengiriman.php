<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_pengiriman');
        $this->load->helper('url');
    }
    public function index()
    {

        $TampilData = $this->M_pengiriman->suratperintah();
        $page = 'Pengiriman Dan Pengemasan';
        $data = [
            'suratperintah' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];
       
        $data['user'] = $this->M_pengiriman->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/pengiriman', $data);
        $this->load->view('panitia/partials/end');
    }

    //Fungsi Delete
    public function delete($pengiriman_id)
    {
        $this->M_pengiriman->deletePengiriman($pengiriman_id);
        redirect('panitia/pengiriman/');
    }
    
    //Fungsi Edit
    public function edit($id)
    {
        $this->form_validation->set_rules('status_transaksi', 'Status Order', 'required');
        if ($this->form_validation->run() == false) {
            redirect('panitia/pengiriman/');
        } else {
            $this->db->set('status_transaksi', $this->input->post('status_transaksi', true));
            $this->db->where('lelang_id', $id);
            $this->db->update('lelang_pengiriman');
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Order Berhasil Terupdate!</div>');
            redirect('panitia/pengiriman/');
        }

    }

    //Fungsi Kirim Email
    public function VerifyEmail(){
        if ($this->M_pengiriman->sendEmail($this->input->post('email')))
        {
            // successfully sent mail
            $this->session->set_flashdata('msg','<script>alert("Success terkirim")</script>');
            
            redirect('panitia/pengiriman'); 
           
        }
        else
        {
            // error
            $this->session->set_flashdata('msg','<script>alert("Gagal Terkirim")</script>');
            
            redirect('panitia/pengiriman');

            
        }
    }

    public function suratPerintah()
    {
        $this->load->library('pdfgenerator');

        $this->data['title_pdf']    = 'Surat Perintah Pengiriman';
        $this->data['sp']           = $this->db->query('
                                                        SELECT lpg.*,lp.* FROM lelang_pengiriman lpg,lelang_pemenang lp WHERE lpg.lelang_id=lp.lelang_id
                                                    ')->result_array();

        // filename dari pdf ketika didownload
        $file_pdf = 'Surat Perintah Pengiriman';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('pelelang/transaksi/surat_perintah', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
