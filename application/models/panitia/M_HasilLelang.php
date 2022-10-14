<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_HasilLelang extends CI_Model
{

    // Menampilkan Data dari Tabel Pembayaran Lelang
    function hasillelang()
    {
        $query = $this->db->get('pembayaran_pelelang');
        return $query->result_array();
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }

    // Get Hasil Lelang By ID

    function hasillelangById($id)
    {
        return $this->db->get_where('pembayaran_pelelang', ['lelang_id' => $id])->row_array();
    }

    // Update Pembayaran By ID

    public function updatePembayaranById($id, $new_bukti_transfer)
    {
        $this->db->set('bukti_transfer', $new_bukti_transfer);
        $this->db->set('nominal_dibayarkan', $this->input->post('nominal_dibayarkan'));
        $this->db->where('lelang_id', $id);
        return $this->db->update('pembayaran_pelelang');
    }
}
