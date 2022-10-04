<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_HasilLelang extends CI_Model
{


    function hasillelang()
    {
        $query = "SELECT * FROM lelang l, pelelang p, lelang_pembayaran lp WHERE l.pelelang_id=p.pelelang_id AND l.lelang_id=lp.lelang_id";
        return $this->db->query($query)->result_array();
    }

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
