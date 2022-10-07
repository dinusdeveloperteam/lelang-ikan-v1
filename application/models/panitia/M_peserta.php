<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_peserta extends CI_Model
{

    // kelola peserta
    function peserta()
    {
        $query = $this->db->get('peserta');
        return $query->result();
    }
    public function hapusDataPeserta($peserta_id)
    {
        return $this->db->delete('peserta', ['peserta_id' => $peserta_id]);
    }
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}