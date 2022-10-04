<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat extends CI_Model
{
    //Fungsi Index
    function riwayat()
    {
        $query = "SELECT p.peserta_id,p.nama,l.produk,l.harga_beli_sekarang,lp.alamat_kirim,testimoni_pemenang FROM peserta p,lelang l,lelang_pemenang lp WHERE p.peserta_id=lp.peserta_id AND l.lelang_id=lp.lelang_id";
        return $this->db->query($query)->result_array();
    }

    //Session Data
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
