<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran_model extends CI_Model
{
    public function automatic_kode()
    {
        $this->db->select('RIGHT(kode_angsuran,4) as kode', FALSE);
        $this->db->order_by('kode_angsuran', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('angsuran');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = 'ANG' . '-' . 'UEK' . '-' . $kodemax;
        return $kodejadi;
    }

    public  function insert_data($data)
    {
        return $this->db->insert("angsuran", $data);
    }
}
