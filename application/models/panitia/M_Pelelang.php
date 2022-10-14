<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelelang
extends CI_Model
{

    // Menampilkan Data dari Tabel Pelelang 

    function pelelang()
    {
        $query = $this->db->get('pelelang');
        return $query->result();
    }

    // Menghapus Data Pelelang

    public function deletePelelang($pelelang_id)
    {
        return $this->db->delete('pelelang', ['pelelang_id' => $pelelang_id]);
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
