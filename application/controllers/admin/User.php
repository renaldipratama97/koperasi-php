<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_user'] = $this->user_model->getAll()->result();
            $data['data_level'] = $this->db->get('level');
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/user/data_user', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_user()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $nik        = $this->input->post('nik');
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $email      = $this->input->post('email');
            $password   = MD5($this->input->post('password'));
            $level      = $this->input->post('level');
            $picture    = $_FILES['picture'];
            $createdAt  = date('Y-m-d');

            if ($picture = '') {
                $this->index();
            } else {
                $config['upload_path']          = './assets/picture';
                $config['allowed_types']        = 'jpg|png|gif|jpeg';
                $config['max_size']             = 10000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('picture')) {
                    $this->index();
                } else {
                    $picture = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'           => $nik,
                'nama'          => $nama,
                'email'         => $email,
                'username'      => $username,
                'password'      => $password,
                'level'         => $level,
                'picture'       => $picture,
                'createdAt'     => $createdAt
            );

            $this->user_model->insert_data($data);
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('admin/user');
        } else {
            redirect('auth');
        }
    }

    public function update_user()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $kode_user = $this->input->post('kode');
            $config['upload_path']          = './assets/picture/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $username   = $this->input->post('username');
                $nama       = $this->input->post('nama');
                $email      = $this->input->post('email');
                $level      = $this->input->post('level');
                $updatedAt  = date('Y-m-d');

                $data = array(
                    'nama'          => $nama,
                    'email'         => $email,
                    'username'      => $username,
                    'level'         => $level,
                    'updatedAt'     => $updatedAt
                );

                $this->db->where('kode_user', $kode_user);
                $this->db->update('user', $data);
                $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
                redirect('admin/user');
            } else {
                $username   = $this->input->post('username');
                $nama       = $this->input->post('nama');
                $email      = $this->input->post('email');
                $level      = $this->input->post('level');
                $updatedAt  = date('Y-m-d');

                $data = array(
                    'nama'          => $nama,
                    'email'         => $email,
                    'username'      => $username,
                    'level'         => $level,
                    'picture'       => $this->upload->data('file_name'),
                    'updatedAt'     => $updatedAt
                );

                $this->db->where('kode_user', $kode_user);
                $this->db->update('user', $data);
                $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
                redirect('admin/user');
            }
        } else {
            redirect('auth');
        }
    }

    public function delete_user($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $where = array('kode_user' => $id);
            $this->user_model->delete_data($where, 'user');
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect('admin/user');
        } else {
            redirect('auth');
        }
    }
}
