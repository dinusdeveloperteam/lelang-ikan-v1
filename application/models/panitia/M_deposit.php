<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_deposit extends CI_Model
{
    // Menampilkan Data dari Tabel Peserta Deposit
    function deposit()
    {
        $query = $this->db->get('peserta_deposit');
        return $query->result();
    }

    // Hapus Data dari Tabel Peserta Deposit

    public function deleteDeposit($deposit_id)
    {
        return $this->db->delete('peserta_deposit', ['deposit_id' => $deposit_id]);
    }

    // Session Data Panitia Lelang

    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
