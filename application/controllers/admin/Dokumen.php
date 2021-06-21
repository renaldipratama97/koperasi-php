<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $data['data_dokumen'] = $this->db->query("SELECT * FROM dokumen a, anggota b WHERE a.kode_anggota=b.nik")->result();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/dokumen/data_dokumen', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function form_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {

            $data['data_anggota'] = $this->db->get('anggota');
            $data['kode'] = $this->dokumen_model->automatic_kode();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/dokumen/form_dokumen', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function add_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $berkas1            = $_FILES['file_one'];
            $berkas2            = $_FILES['file_two'];
            $createdAt          = date('Y-m-d');

            if ($berkas1 == '') {
                redirect('admin/dokumen');
            } else {
                $config['upload_path']          = './assets/dokumen';
                $config['allowed_types']        = 'doc|docx|pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file_one')) {
                    $this->index();
                } else {
                    $berkas1 = $this->upload->data('file_name');
                }
            }

            if ($berkas2 == '') {
                redirect('admin/dokumen');
            } else {
                $config['upload_path']          = './assets/dokumen';
                $config['allowed_types']        = 'doc|docx|pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file_two')) {
                    $this->index();
                } else {
                    $berkas2 = $this->upload->data('file_name');
                }
            }

            $data = array(
                'kode_dokumen' => $this->input->post('kode_dokumen'),
                'kode_anggota' => $this->input->post('anggota'),
                'file_one'     => $berkas1,
                'file_two'     => $berkas2,
                'createdAtt'   => $createdAt
            );

            $this->dokumen_model->insert_data($data);
            $this->session->set_flashdata('message', 'Data Berhasil di Tambahkan');
            redirect('admin/dokumen');
        } else {
            redirect('auth/logout');
        }
    }

    public function delete_dokumen($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $where = array('kode_dokumen' => $id);
            $this->dokumen_model->delete_data($where, 'dokumen');
            $this->session->set_flashdata('message', 'Delete Data Success');
            redirect('admin/dokumen');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $kode_dokumen = $this->uri->segment(4);
            $data['data_dokumen'] = $this->dokumen_model->edit_data($kode_dokumen);
            foreach ($data as $resultdata) {
                $result['kode_dokumen']         = $resultdata->kode_dokumen;
                $result['kode_anggota']         = $resultdata->kode_anggota;
                $result['file_one']             = $resultdata->file_one;
                $result['file_two']             = $resultdata->file_two;
            }
            $result['data_anggota'] = $this->db->get('anggota');
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('admin/dokumen/edit_dokumen', $result);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function update_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
            $kode_dokumen       = $this->input->post('kode_dokumen');
            $berkas1            = $_FILES['file_one'];
            $berkas2            = $_FILES['file_two'];
            $modifiedAt          = date('Y-m-d');

            if ($berkas1 == '') {
                redirect('anggota/profile/detail_dokumen');
            } else {
                $config['upload_path']          = './assets/dokumen';
                $config['allowed_types']        = 'doc|docx|pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file_one')) {
                    $this->index();
                } else {
                    $berkas1 = $this->upload->data('file_name');
                }
            }

            if ($berkas2 == '') {
                redirect('anggota/profile/detail_dokumen');
            } else {
                $config['upload_path']          = './assets/dokumen';
                $config['allowed_types']        = 'doc|docx|pdf';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file_two')) {
                    $this->index();
                } else {
                    $berkas2 = $this->upload->data('file_name');
                }
            }

            $data = array(
                'file_one'     => $berkas1,
                'file_two'     => $berkas2,
                'modifiedAtt'   => $modifiedAt
            );

            $this->db->where('kode_dokumen', $kode_dokumen);
            $this->db->update('dokumen', $data);
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
            redirect('admin/dokumen');
        } else {
            redirect('auth/logout');
        }
    }
}
