<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penerima extends CI_Model
{
    // Menampilkan Data Relasi Penerima Lelang 

    function penerima()
    {
        $query = "SELECT lp.*,p.*,p.nama,lp.konfirmasi_terimaproduk FROM lelang_pemenang lp,peserta p WHERE lp.peserta_id=p.peserta_id";
        return $this->db->query($query)->result_array();
    }

    // Menghapus Data Penerima Lelang

    function deletePenerima($peserta_id)
    {
        return $this->db->query("DELETE lp, p FROM lelang_pemenang lp JOIN peserta p ON lp.peserta_id=p.peserta_id WHERE lp.peserta_id=$peserta_id");
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
