<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->order_by('kode_pinjam', 'DESC');
        return $this->db->get();
    }

    public  function insert_data($data)
    {
        return $this->db->insert("pinjam", $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($data, $id)
    {
        //update data
        return $this->db->update("pinjam", $data, $id);
    }

    public function automatic_kode()
    {
        $this->db->select('RIGHT(kode_pinjam,4) as kode', FALSE);
        $this->db->order_by('kode_pinjam', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pinjam');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = 'P' . '-' . 'UEK' . '-' . $kodemax;
        return $kodejadi;
    }

    public function setuju_pinjam($id)
    {
        $this->db->set('status', 1);
        $this->db->set('tgl_persetujuan', date('Y-m-d'));
        $this->db->where('kode_pinjam', $id);
        return $this->db->update('pinjam');
    }

    public function tidak_setuju_pinjam($id)
    {
        $this->db->set('status', 2);
        $this->db->set('tgl_persetujuan', date('Y-m-d'));
        $this->db->where('kode_pinjam', $id);
        return $this->db->update('pinjam');
    }
}
