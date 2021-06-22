<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $nik = $this->session->userdata('nik');
            $data['data_angsuran'] = $this->db->query("SELECT * FROM angsuran a,anggota b WHERE a.kode_anggota=b.nik AND a.kode_anggota='$nik'")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/angsuran/data_angsuran', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }
}
