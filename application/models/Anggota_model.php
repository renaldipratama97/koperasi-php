<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->order_by('nik', 'DESC');
        return $this->db->get();
    }

    public  function insert_data($data)
    {
        return $this->db->insert("anggota", $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $query = $this->db->where("nik", $id)->get("anggota");
        return $query->row();
    }

    public function update_data($data, $id)
    {
        //update data
        return $this->db->update("anggota", $data, $id);
    }
}
