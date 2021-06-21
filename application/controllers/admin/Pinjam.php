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
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_pinjam'] = $this->db->query("SELECT * FROM pinjam a, anggota b, tenor c WHERE a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND a.status=1")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/pinjam/data_pinjam', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function form_pinjam()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_tenor'] = $this->db->get('tenor');
            $data['data_anggota'] = $this->db->get('anggota');
            $data['kode'] = $this->pinjam_model->automatic_kode();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/pinjam/form_pinjam', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_pinjam()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['kode_pinjam']  = $this->input->post('kode');
            $data['kode_anggota'] = $this->input->post('anggota');
            $data['jumlah_pinjam'] = $this->input->post('jumlah_pinjam');
            $data['tenor'] = $this->input->post('tenor');
            $data['tgl_pengajuan'] = $this->input->post('tgl_pengajuan');
            $data['tgl_persetujuan'] = $this->input->post('tgl_pengajuan');
            $data['status'] = 1;
            $data['deskripsi'] = $this->input->post('deskripsi');

            $this->pinjam_model->insert_data($data);
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('admin/pinjam');
        } else {
        }
    }

    public function persetujuan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_pinjam'] = $this->db->query("SELECT * FROM pinjam a, anggota b, tenor c WHERE a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND a.status=0")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/pinjam/persetujuan', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function proses_setuju($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $this->pinjam_model->setuju_pinjam($id);
            $this->session->set_flashdata('message', 'Peminjaman Disetujui');
            redirect('admin/pinjam/persetujuan');
        } else {
            redirect('auth');
        }
    }

    public function proses_tidak_setuju($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $this->pinjam_model->tidak_setuju_pinjam($id);
            $this->session->set_flashdata('message', 'Peminjaman Tidak Disetujui');
            redirect('admin/pinjam/persetujuan');
        } else {
            redirect('auth');
        }
    }

    public function delete_pinjam($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $where = array('kode_pinjam' => $id);
            $this->pinjam_model->delete_data($where, 'pinjam');
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect('admin/pinjam');
        } else {
            redirect('auth/logout');
        }
    }
}
