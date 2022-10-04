<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelelang
 extends CI_Model
{

    // kelola pelelang
    function pelelang()
    {
        $query = $this->db->get('pelelang');
        return $query->result();
    }
    public function delete($pelelang_id)
    {
        return $this->db->delete('pelelang', ['pelelang_id' => $pelelang_id]);
    }
    function user_panitiaById($name)
    {
        return $this->db->get_where('panitia', ['panitia_id' => $name])->row();
    }
}
