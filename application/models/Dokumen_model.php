<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen_model extends CI_Model
{
    public  function insert_data($data)
    {
        return $this->db->insert("dokumen", $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $query = $this->db->where("kode_dokumen", $id)->get("dokumen");
        return $query->row();
    }

    public function update_data($data, $id)
    {
        //update data
        return $this->db->update("dokumen", $data, $id);
    }

    public function automatic_kode()
    {
        $this->db->select('RIGHT(kode_dokumen,4) as kode', FALSE);
        $this->db->order_by('kode_dokumen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('dokumen');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = 'D' . '-' . 'UEK' . '-' . $kodemax;
        return $kodejadi;
    }
}
