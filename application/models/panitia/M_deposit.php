<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_deposit extends CI_Model
{
    function deposit()
    {
        $query = $this->db->get('peserta_deposit');
        return $query->result();
    }
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}