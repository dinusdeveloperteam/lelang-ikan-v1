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

    function calonpemenangByLelang($id)
    {
        // $query = "SELECT * FROM lelang l,peserta p,lelang_bid lb WHERE l.lelang_id=lb.lelang_id AND lb.peserta_id=p.peserta_id";
        $query = "SELECT peserta.nama, lelang_bid.* FROM peserta JOIN lelang_bid ON peserta.peserta_id=lelang_bid.peserta_id  AND lelang_id='$id' ORDER BY lelang_bid.harga_tawar DESC";
        return $this->db->query($query)->result_array();
    }
}
