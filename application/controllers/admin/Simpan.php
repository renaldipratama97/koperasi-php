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
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_simpan'] = $this->db->query("SELECT * FROM simpan a, anggota b, jenis_simpan c WHERE a.kode_anggota=b.nik AND a.kode_jenis_simpan=c.id")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/simpan/data_simpan', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function form_simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_jenis_simpan'] = $this->db->get('jenis_simpan');
            $data['data_anggota'] = $this->db->get('anggota');
            $data['kode'] = $this->simpan_model->automatic_kode();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/simpan/form_simpan', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $kode_simpan  = $this->input->post('kode');
            $kode_anggota = $this->input->post('anggota');
            $kode_jenis_simpan  = $this->input->post('jenis_simpan');
            $jumlah_simpan  = $this->input->post('jumlah_simpan');
            $tgl_simpan  = date('Y-m-d H:i:s');
            $createdAt  = date('Y-m-d');

            $data_simpan = array(
                'kode_simpan'    => $kode_simpan,
                'kode_anggota'   => $kode_anggota,
                'kode_jenis_simpan'   => $kode_jenis_simpan,
                'jumlah_simpan'   => $jumlah_simpan,
                'tgl_simpan'   => $tgl_simpan,
                'createdAt'   => $createdAt,
            );

            $this->simpan_model->insert_data($data_simpan);
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('admin/simpan');
        } else {
            redirect('auth');
        }
    }

    public function delete_simpan($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $where = array('kode_simpan' => $id);
            $this->simpan_model->delete_data($where, 'simpan');
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect('admin/simpan');
        } else {
            redirect('auth');
        }
    }

    public function add_saldo($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $nilai = $this->input->post('jumlah_simpan');
            $this->db->query("UPDATE simpan SET jumlah_simpan = jumlah_simpan + '$nilai' WHERE kode_simpan = '$id'");
            $this->session->set_flashdata('message', 'Tambah Saldo Berhasil');
            redirect('admin/simpan');
        } else {
            redirect('auth/logout');
        }
    }
}
