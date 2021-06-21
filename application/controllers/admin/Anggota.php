<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_anggota'] = $this->anggota_model->getAll()->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/anggota/data_anggota', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function form_anggota()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {

            $data['data_agama'] = $this->db->get('agama');
            $data['data_jenkel'] = $this->db->get('jenkel');
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/anggota/form_anggota', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_anggota()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $nik        = $this->input->post('nik');
            $nama       = $this->input->post('nama');
            $email      = $this->input->post('email');
            $password   = MD5($this->input->post('password'));
            $jenkel     = $this->input->post('jenkel');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir  = $this->input->post('tgl_lahir');
            $agama      = $this->input->post('agama');
            $pekerjaan  = $this->input->post('pekerjaan');
            $no_telp    = $this->input->post('no_telp');
            $alamat     = $this->input->post('alamat');
            $level      = 2;
            $picture    = $_FILES['picture'];
            $createdAt  = date('Y-m-d');
            $status     = 1;

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
                'nik'            => $nik,
                'nama'           => $nama,
                'tempat_lahir'   => $tempat_lahir,
                'tgl_lahir'      => $tgl_lahir,
                'jenkel'         => $jenkel,
                'agama'          => $agama,
                'pekerjaan'      => $pekerjaan,
                'alamat'         => $alamat,
                'email'         => $email,
                'no_telp'       => $no_telp,
                'picture'       => $picture,
                'password'      => $password,
                'level'         => $level,
                'createdAt'     => $createdAt,
                'status_activation'        => $status
            );

            $this->anggota_model->insert_data($data);
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('admin/anggota');
        } else {
            redirect('auth');
        }
    }

    public function delete_anggota($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $where = array('nik' => $id);
            $this->anggota_model->delete_data($where, 'anggota');
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect('admin/anggota');
        } else {
            redirect('auth');
        }
    }

    public function edit_anggota()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $nik = $this->uri->segment(4);
            $data['data_anggota'] = $this->anggota_model->edit_data($nik);
            foreach ($data as $resultdata) {
                $result['nik']          = $resultdata->nik;
                $result['nama']         = $resultdata->nama;
                $result['tempat_lahir'] = $resultdata->tempat_lahir;
                $result['tgl_lahir']    = $resultdata->tgl_lahir;
                $result['agama']        = $resultdata->agama;
                $result['jenkel']       = $resultdata->jenkel;
                $result['alamat']       = $resultdata->alamat;
                $result['no_telp']      = $resultdata->no_telp;
                $result['email']        = $resultdata->email;
                $result['pekerjaan']    = $resultdata->pekerjaan;
                $result['picture']      = $resultdata->picture;
            }
            $result['data_agama'] = $this->db->get('agama');
            $result['data_jenkel'] = $this->db->get('jenkel');
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/anggota/edit_anggota', $result);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function update_anggota()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $nik = $this->input->post('nik');
            $config['upload_path']          = './assets/picture/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 10000;
            $config['max_height']           = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('picture')) {
                $nama               = $this->input->post('nama');
                $tempat_lahir       = $this->input->post('tempat_lahir');
                $tgl_lahir          = $this->input->post('tgl_lahir');
                $pekerjaan          = $this->input->post('pekerjaan');
                $no_telp            = $this->input->post('no_telp');
                $email              = $this->input->post('email');
                $agama              = $this->input->post('agama');
                $jenkel             = $this->input->post('jenkel');
                $alamat             = $this->input->post('alamat');
                $updatedAt          = date('Y-m-d');

                $data = array(
                    'nama'          => $nama,
                    'tempat_lahir'  => $tempat_lahir,
                    'tgl_lahir'     => $tgl_lahir,
                    'jenkel'        => $jenkel,
                    'agama'         => $agama,
                    'pekerjaan'     => $pekerjaan,
                    'alamat'        => $alamat,
                    'email'         => $email,
                    'no_telp'       => $no_telp,
                    'updatedAt'     => $updatedAt
                );

                $this->db->where('nik', $nik);
                $this->db->update('anggota', $data);
                $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
                redirect('admin/anggota');
            } else {
                $nama               = $this->input->post('nama');
                $tempat_lahir       = $this->input->post('tempat_lahir');
                $tgl_lahir          = $this->input->post('tgl_lahir');
                $pekerjaan          = $this->input->post('pekerjaan');
                $no_telp            = $this->input->post('no_telp');
                $email              = $this->input->post('email');
                $agama              = $this->input->post('agama');
                $jenkel             = $this->input->post('jenkel');
                $alamat             = $this->input->post('alamat');
                $updatedAt          = date('Y-m-d');

                $data = array(
                    'nama'          => $nama,
                    'tempat_lahir'  => $tempat_lahir,
                    'tgl_lahir'     => $tgl_lahir,
                    'jenkel'        => $jenkel,
                    'agama'         => $agama,
                    'pekerjaan'     => $pekerjaan,
                    'alamat'        => $alamat,
                    'email'         => $email,
                    'no_telp'       => $no_telp,
                    'picture'       => $this->upload->data('file_name'),
                    'updatedAt'     => $updatedAt
                );

                $this->db->where('nik', $nik);
                $this->db->update('anggota', $data);
                $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
                redirect('admin/anggota');
            }
        } else {
            redirect('auth');
        }
    }
}
