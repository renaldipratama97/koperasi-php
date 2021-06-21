<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getLoginAdmin($data)
    {
        $login['username'] = $data['username'];
        $login['password'] = md5($data['password']);
        $login['level'] = 1;

        $cek = $this->db->get_where('user', $login);

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $result) {
                $sess_data['logged_in']            = 'yesGetMeLoginBaby';
                $sess_data['kode_user']            = $result->kode_user;
                $sess_data['nik']                  = $result->nik;
                $sess_data['nama']                  = $result->nama;
                $sess_data['email']                = $result->email;
                $sess_data['username']             = $result->username;
                $sess_data['picture']              = $result->picture;
                $sess_data['level']                = $result->level;

                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
                echo "<script>
				alert('selamat login berhasil, Selamat datang Admin');
				window.location='" . site_url('welcome') . "';
				</script>";

                // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            } else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "1") {
                redirect('welcome');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Login Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            // $this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.");
            redirect('auth');
        }
    }

    public function getLoginMember($data)
    {
        $login['nik']           = $data['nik'];
        $login['password']      = md5($data['password']);
        $login['level']         = 2;

        $cek = $this->db->get_where('anggota', $login);

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $result) {
                $sess_data['logged_in']             = 'yesGetMeLoginBaby';
                $sess_data['nik']                   = $result->nik;
                $sess_data['nama']                  = $result->nama;
                $sess_data['picture']               = $result->picture;
                $sess_data['level']                 = $result->level;

                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "2") {
                echo "<script>
				alert('selamat login berhasil, Selamat datang Member');
				window.location='" . site_url('welcome') . "';
				</script>";
            } else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "3") {
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Periksa lagi Username dan Password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    public function insert_data($data)
    {
        return $this->db->insert("anggota", $data);
    }
}
