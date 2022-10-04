<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penerima extends CI_Model
{
    function penerima()
    {
        $query = "SELECT lp.*,p.*,p.nama,lp.konfirmasi_terimaproduk FROM lelang_pemenang lp,peserta p WHERE lp.peserta_id=p.peserta_id";
        return $this->db->query($query)->result_array();
    }

    function user_panitiaById($name)
    {
        return $this->db->
        get_where('panitia', ['panitia_id' => $name])->row();
    }

    function delete($lelang_id)
    {
        return $this->db->delete('lelang_pemenang', ['lelang_id' => $lelang_id]);
    }
}
