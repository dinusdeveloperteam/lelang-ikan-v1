<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_HasilLelang extends CI_Model
{


    function hasillelang()
    {
        $query = $this->db->get('pembayaran_pelelang');
        return $query->result_array();
    }

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }

    function hasillelangById($id)
    {
        return $this->db->get_where('pembayaran_pelelang', ['lelang_id' => $id])->row_array();
    }

    public function updatePembayaranById($id, $new_bukti_transfer)
    {
        $this->db->set('bukti_transfer', $new_bukti_transfer);
        $this->db->set('nominal_dibayarkan', $this->input->post('nominal_dibayarkan'));
        $this->db->where('lelang_id', $id);
        return $this->db->update('pembayaran_pelelang');
    }
}
