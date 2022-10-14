<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilLelang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/M_HasilLelang');
        $this->load->helper('url');
    }

    // Menampilkan Data Hasil Lelang

    public function index()
    {

        $TampilData = $this->M_HasilLelang->hasillelang();
        $page = 'Pembayaran Hasil Lelang';
        $data = [
            'Hasillelang' => $TampilData,
            'title' => $page,
            'breadcrumb' => $page
        ];


        $data['user'] = $this->M_HasilLelang->user_panitiaById($this->session->panitia_id);
        $this->load->view('panitia/partials/start', $data);
        $this->load->view('panitia/kelola_lelang/hasillelang', $data);
        $this->load->view('panitia/partials/end');
    }

    // Edit Data Hasil Lelang

    public function halaman_edit($id)
    {
        $this->form_validation->set_rules('nominal_dibayarkan', 'Nominal Dibayarkan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msgInfo', '<div class="alert alert-danger" role="alert">
				<div class="alert-text">Anda belum mengisi apapun !</div>
			</div>');
            redirect('panitia/hasillelang');
        } else {
            $data['pembayaran_pelelang'] = $this->M_HasilLelang->hasillelangById($id);
            $new_bukti_transfer = $data['pembayaran_pelelang']['bukti_transfer'];
            $fileExt = pathinfo($_FILES["bukti_transfer"]["name"], PATHINFO_EXTENSION);
            $upload_bukti_transfer = 'bukti_transfer-' . date('d-m-Y') . '-' . time() . '.' . $fileExt;
            if ($upload_bukti_transfer) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './vendors/uploads/panitia/buktitransfer/';
                $config['file_name'] = $upload_bukti_transfer;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('bukti_transfer')) {
                    $old_bukti_transfer = $data['pembayaran_pelelang']['bukti_transfer'];
                    unlink(FCPATH . 'vendors/uploads/panitia/buktitransfer/' . $old_bukti_transfer);
                    $new_bukti_transfer = $this->upload->data('file_name');
                }
                //  else {
                //     $this->session->set_flashdata('msgInfo', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                //     // var_dump($this->upload->display_errors());
                //     // var_dump($this->db->last_query());
                //     // redirect('panitia/hasillelang');
                // }
            }
            $this->M_HasilLelang->updatePembayaranById($id, $new_bukti_transfer);
            $this->session->set_flashdata('msgInfo', '<div class="alert alert-success" role="alert">
				<div class="alert-text">Sukses mengubah data !</div>
			</div>');
            redirect('panitia/hasillelang');
        }
    }
}
