<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpan_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('simpan');
        $this->db->order_by('kode_simpan', 'DESC');
        return $this->db->get();
    }

    public  function insert_data($data)
    {
        return $this->db->insert("simpan", $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($data, $id)
    {
        //update data
        return $this->db->update("simpan", $data, $id);
    }

    public function automatic_kode()
    {
        $this->db->select('RIGHT(kode_simpan,4) as kode', FALSE);
        $this->db->order_by('kode_simpan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('simpan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = 'S' . '-' . 'UEK' . '-' . $kodemax;
        return $kodejadi;
    }
}
