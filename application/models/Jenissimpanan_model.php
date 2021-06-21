<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenissimpanan_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('jenis_simpan');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    public  function insert_data($data)
    {
        return $this->db->insert("jenis_simpan", $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $query = $this->db->where("id", $id)->get("jenis_simpan");
        return $query->row();
    }

    public function update_data($data, $id)
    {
        //update data
        return $this->db->update("jenis_simpan", $data, $id);
    }
}
