<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('angsuran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_pinjam'] = $this->db->query("SELECT * FROM pinjam a, anggota b, tenor c WHERE a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND a.status=1")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/angsuran/data_angsuran', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function form_angsuran()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $id = $this->uri->segment(4);
            $data['angsuran'] = $this->db->query("SELECT * FROM pinjam a, anggota b, tenor c WHERE a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND kode_pinjam='$id'")->result();
            $data['automatic_kode'] = $this->angsuran_model->automatic_kode();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/angsuran/form_angsuran', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_angsuran()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $kode_angsuran   = $this->input->post('kode');
            $kode_pinjam     = $this->input->post('kode_pinjam');
            $kode_anggota    = $this->input->post('kode_anggota');
            $jumlah_bayar    = $this->input->post('jumlah_bayar');
            $angsuran_ke     = $this->input->post('angsuran_ke');
            $deskripsi       = $this->input->post('deskripsi');

            $data_angsuran = array(
                'kode_angsuran' => $kode_angsuran,
                'kode_pinjam'      => $kode_pinjam,
                'kode_anggota'      => $kode_anggota,
                'jumlah_bayar'      => $jumlah_bayar,
                'angsuran_ke'      => $angsuran_ke,
                'deskripsi'      => $deskripsi,
                'createdAt'      => date('Y-m-d')
            );

            $this->angsuran_model->insert_data($data_angsuran);
            redirect('admin/angsuran');
        } else {
            redirect('auth');
        }
    }
}
