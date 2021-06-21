<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pinjam_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $data['data_tenor'] = $this->db->get('tenor');
            $data['kode'] = $this->pinjam_model->automatic_kode();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/pinjam/form_pinjam', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_pinjam()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $data['kode_pinjam']  = $this->input->post('kode');
            $data['kode_anggota'] = $this->session->userdata('nik');
            $data['jumlah_pinjam'] = $this->input->post('jumlah_pinjam');
            $data['tenor'] = $this->input->post('tenor');
            $data['tgl_pengajuan'] = $this->input->post('tgl_pengajuan');
            $data['status'] = 0;
            $data['deskripsi'] = $this->input->post('deskripsi');

            $this->pinjam_model->insert_data($data);
            $this->session->set_flashdata('message', 'Permohonan Peminjaman Berhasil Diajukan');
            redirect('anggota/pinjam');
        } else {
            redirect('auth');
        }
    }

    public function status_peminjaman()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $user = $this->session->userdata('nik');
            $data['data_pinjam'] = $this->db->query("SELECT * FROM pinjam a, anggota b, tenor c WHERE a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND a.kode_anggota=$user");
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/pinjam/status_pinjam', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }
}
