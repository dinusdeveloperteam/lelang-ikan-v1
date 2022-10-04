<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suratperintah extends CI_Model
{
    //Fungsi Index
    function suratperintah()
    {
        $query = "SELECT lpg.*,lp.*,p.* FROM lelang_pengiriman lpg,lelang_pemenang lp,peserta p WHERE lpg.lelang_id=lp.lelang_id=p.peserta_id";
        return $this->db->query($query)->result_array();
    }

    //Fungsi Delete
    public function deletePengiriman($lelang_id)
    {
        return $this->db->delete('lelang_pengiriman', ['pengiriman_id' => $lelang_id]);
    }

    //Session Data
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }

    // Fungsi Kirim Email
    function sendEmail($to_email)
    {
        $from_email = 'lelangikan222@gmail.com'; //change this to yours
        $subject = 'Surat Pengiriman';
        // $to_email=$this->input->post('email');
        $message = 'Kepada Peserta,<br /><br />Selamat anda pemenang lelang<br /><br /> Silahkan Cek Akun Pelelang Anda'  . '<br /><br /><br />Terima kasih<br />';

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = 'lelangikan222@gmail.com';
        $config['smtp_pass'] = 'kbjidqivoreymhud'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        //send mail
        $this->email->from($from_email, 'Lelang Ikan');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}
