<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('kode_user', 'DESC');
        return $this->db->get();
    }

    public  function insert_data($data)
    {
        return $this->db->insert("user", $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($data, $id)
    {
        //update data
        return $this->db->update("user", $data, $id);
    }
}
