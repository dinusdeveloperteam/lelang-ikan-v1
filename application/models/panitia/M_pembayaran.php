<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
    // Menampilkan Data Relasi

    function pembayaran()
    {
        $query = "SELECT lb.*,lm.*,l.produk,p.nama as nama_peserta FROM lelang_pembayaran lb,lelang_pemenang lm,lelang l,peserta p where lb.lelang_id=lm.lelang_id and lm.peserta_id=p.peserta_id and l.lelang_id=lb.lelang_id";
        return $this->db->query($query)->result_array();
    }

    // Menghapus Data Pembayaran

    public function deletePembayaran($lelang_id)
    {
        return $this->db->delete('lelang_pembayaran', ['lelang_id' => $lelang_id]);
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
