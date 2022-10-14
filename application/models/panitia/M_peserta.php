<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_peserta extends CI_Model
{
    // Menampilkan Data Peserta Lelang

    function peserta()
    {
        $query = $this->db->get('peserta');
        return $query->result();
    }

    // Menghapus Data Peserta Lelang

    public function deletePeserta($peserta_id)
    {
        return $this->db->delete('peserta', ['peserta_id' => $peserta_id]);
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
