<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_deposit extends CI_Model
{
    function deposit()
    {
        $query = $this->db->get('peserta_deposit');
        return $query->result();
    }
    public function delete($peserta_id)
    {
        return $this->db->delete('peserta_deposit', ['peserta_id' => $peserta_id]);
    }
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}