<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembukaanlelang extends CI_Model
{

    // Menampilkan Data Relasi Calon Pemenang Lelang

    function calonpemenangByLelang($id)
    {
        // $query = "SELECT * FROM lelang l,peserta p,lelang_bid lb WHERE l.lelang_id=lb.lelang_id AND lb.peserta_id=p.peserta_id";
        $query = "SELECT peserta.nama, lelang_bid.* FROM peserta JOIN lelang_bid ON peserta.peserta_id=lelang_bid.peserta_id  AND lelang_id='$id' ORDER BY lelang_bid.harga_tawar DESC";
        return $this->db->query($query)->result_array();
    }

    // Menampilkan Limit Data Calon Pemenang Lelang

    function calonpemenangByLelanglimit1($id)
    {
        // $query = "SELECT * FROM lelang l,peserta p,lelang_bid lb WHERE l.lelang_id=lb.lelang_id AND lb.peserta_id=p.peserta_id";
        $query = "SELECT peserta.nama, lelang_bid.* FROM peserta JOIN lelang_bid ON peserta.peserta_id=lelang_bid.peserta_id  AND lelang_id='$id' ORDER BY lelang_bid.harga_tawar DESC LIMIT 1";
        return $this->db->query($query)->row_array();
    }

    // Menampilkan Data Relasi Pembukaan Lelang

    public function pembukaanLelang()
    {
        $query = "SELECT pl.nama,l.* FROM lelang l,pelelang pl WHERE l.pelelang_id=pl.pelelang_id";
        return $this->db->query($query)->result_array();
    }

    // Menampilkan Harga Tawar Maksimal

    function Getmaxhargatawar($lelang_id)
    {
        $query = "SELECT * FROM lelang_bid where lelang_id = '$lelang_id' and harga_tawar = ( SELECT MAX(harga_tawar) FROM lelang_bid )";
        return $this->db->query($query)->row_array();
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }

    // Menghapus Data Pembukaan Lelang

    public function deletePembukaanLelang($lelang_id)
    {
        return $this->db->delete('lelang', ['lelang_id' => $lelang_id]);
    }

    // Get Data Lelang By ID

    public function getById($id)
    {
        //return $this->db->get_where($this->_table, ["lelang_id" => $id])->row();
        return $this->db->get_where('lelang', ["lelang_id" => $id])->row();
    }
}
