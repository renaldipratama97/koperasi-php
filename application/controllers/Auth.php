<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dokumen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/index');
    }

    public function cek()
    {
        if ($this->session->userdata('logged_in') == "") {

            $level = $this->input->post('level');

            $id = $level;

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            // $this->form_validation->set_rules('role', 'Role', 'trim|required');

            // var_dump($id_role);

            if ($id == 1) {
                $dt['username']     = $this->input->post('username');
                $dt['password']     = $this->input->post('password');

                $this->auth_model->getLoginAdmin($dt);
            } else if ($id == 2) {
                $dt['nik']     = $this->input->post('username');
                $dt['password']     = $this->input->post('password');

                $this->auth_model->getLoginMember($dt);
            }
        } else if ($this->session->userdata('logged_in') != "") {
            redirect('auth');
        }
    }

    public function register()
    {
        $nik        = $this->input->post('nik');
        $nama       = $this->input->post('nama_lengkap');
        $password   = MD5($this->input->post('registerpassword'));
        $level      = 2;
        $picture    = 'default.jpg';
        $createdAt  = date('Y-m-d');
        $status     = 1;

        $data = array(
            'nik'            => $nik,
            'nama'           => $nama,
            'picture'        => $picture,
            'password'       => $password,
            'level'          => $level,
            'createdAt'      => $createdAt,
            'status_activation'         => $status
        );

        $kode = $this->dokumen_model->automatic_kode();
        $datadokumen = array(
            'kode_dokumen' => $kode,
            'kode_anggota' => $nik,
            'createdAtt'   => $createdAt
        );
        $this->auth_model->insert_data($data);
        $this->dokumen_model->insert_data($datadokumen);
        redirect('auth');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
