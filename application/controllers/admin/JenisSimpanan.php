<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisSimpanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenissimpanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_jenissimpanan'] = $this->jenissimpanan_model->getAll()->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/jenis-simpanan/data_jenissimpanan', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_jenissimpanan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $jenis_simpanan  = $this->input->post('jenis_simpanan');
            $deskripsi       = $this->input->post('deskripsi');

            $data_jenissimpanan = array(
                'jenis_simpanan' => $jenis_simpanan,
                'deskripsi'      => $deskripsi,
            );

            $this->jenissimpanan_model->insert_data($data_jenissimpanan);
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('admin/JenisSimpanan');
        } else {
            redirect('auth');
        }
    }

    public function update_jenissimpanan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $kode['id'] = $this->input->post('kode');
            $jenis_simpanan = $this->input->post('jenis_simpanan');
            $deskripsi = $this->input->post('deskripsi');

            $data = array(
                'jenis_simpanan' => $jenis_simpanan,
                'deskripsi'      => $deskripsi

            );

            //update via model    
            $this->jenissimpanan_model->update_data($data, $kode);
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
            redirect('admin/JenisSimpanan');
        } else {
            redirect('auth');
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $this->db->query("DELETE FROM jenis_simpan WHERE id='$id'");
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect('admin/jenissimpanan');
        } else {
            redirect('auth/logout');
        }
    }
}
