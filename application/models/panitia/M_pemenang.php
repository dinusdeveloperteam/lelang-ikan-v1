<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pemenang extends CI_Model
{
    function pemenang()
    {
        $this->db->select('peserta.peserta_id,peserta.nik,peserta.npwp,peserta.nama,peserta.jeniskel, peserta.telp, peserta.email,lelang.produk,lelang_pemenang.tgl_diumumkan,lelang_pemenang.konfirmasi_terimaproduk,lelang_pemenang.status,lelang_pemenang.lelang_id,lelang_pemenang.bukti_bayar,lelang_pemenang.tgl_bayar,lelang_pemenang.alamat_kirim,lelang_pemenang.kota_kirim,lelang_pemenang.kelurahan_kirim,lelang_pemenang.kecamatan_kirim,lelang_pemenang.provinsi_kirim,lelang_pemenang.testimoni_pemenang');
        $this->db->from('lelang_pemenang');
        $this->db->join('lelang', 'lelang_pemenang.lelang_id=lelang.lelang_id');
        $this->db->join('peserta', 'lelang_pemenang.peserta_id=peserta.peserta_id');
        $this->db->order_by('peserta.peserta_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
    public function deletepemenang($peserta_id)
    {
        return $this->db->delete('lelang_pemenang', ['peserta_id' => $peserta_id]);
    }
}