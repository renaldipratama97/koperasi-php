<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('simpan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $me = $this->session->userdata('nik');
            $data['data_simpan'] = $this->db->query("SELECT * FROM simpan a, anggota b, jenis_simpan c WHERE a.kode_anggota=b.nik AND a.kode_jenis_simpan=c.id AND a.kode_anggota='$me'")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/simpan/data_simpan', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }
}
