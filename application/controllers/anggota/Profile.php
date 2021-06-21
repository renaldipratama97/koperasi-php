<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->model('dokumen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $data['data_tenor'] = $this->db->get('tenor');
            $data['kode'] = $this->pinjam_model->automatic_kode();
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/profile/detail_profile', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth');
        }
    }

    public function detail_profile()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $user = $this->session->userdata('nik');
            $data['data_anggota'] = $this->anggota_model->edit_data($user);
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
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/profile/detail_profile', $result);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit_profile()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
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
            $this->load->view('anggota/profile/edit_profile', $result);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function update_profile()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
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
                redirect('anggota/profile/detail_profile');
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
                redirect('anggota/profile/detail_profile');
            }
        } else {
            redirect('auth/logout');
        }
    }

    public function detail_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
            $user = $this->session->userdata('nik');
            $data['data_dokumen'] = $this->db->query("SELECT * FROM dokumen a, anggota b WHERE a.kode_anggota=b.nik AND a.kode_anggota='$user'")->row();
            foreach ($data as $resultdata) {
                $result['kode_dokumen'] = $resultdata->kode_dokumen;
                $result['kode_anggota'] = $resultdata->kode_anggota;
                $result['nama'] = $resultdata->nama;
                $result['file_one']     = $resultdata->file_one;
                $result['file_two']     = $resultdata->file_two;
                $result['createdAtt']   = $resultdata->createdAtt;
                $result['modifiedAtt']  = $resultdata->modifiedAtt;
                $result['nama']         = $resultdata->nama;
            }
            $this->load->view('template/header');
            $this->load->view('template/nav');
            $this->load->view('anggota/dokumen/detail_dokumen', $result);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function edit_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
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
            $this->load->view('anggota/dokumen/edit_dokumen', $result);
            $this->load->view('template/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function update_dokumen()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
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
                    $this->detail_dokumen();
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
                    $this->detail_dokumen();
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
            $this->session->set_flashdata('message', 'Data Berhasil di Ubah');
            $this->db->update('dokumen', $data);
            redirect('anggota/profile/detail_dokumen');
        } else {
            redirect('auth/logout');
        }
    }
}
