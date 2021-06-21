<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenissimpanan_model');
        $this->load->library('form_validation');
    }

    public function laporan_angsuran()
    {
        $data['data_laporan'] = $this->db->query("SELECT * FROM angsuran a,anggota b where a.kode_anggota=b.nik")->result();
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('admin/laporan/laporan_angsuran', $data);
        $this->load->view('template/footer');
    }

    public function angsuran_pdf()
    {
        $data['data_laporan'] = $this->db->query("SELECT * FROM angsuran a,anggota b where a.kode_anggota=b.nik")->result();
        $this->load->library('pdf');
        $this->pdf->load_view('admin/laporan/export_angsuran', $data);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->render();
        $this->pdf->stream("laporan_data_angsuran.pdf");
    }

    public function laporan_simpan()
    {
        $data['data_laporan'] = $this->db->query("SELECT * FROM simpan a,anggota b, jenis_simpan c where a.kode_anggota=b.nik AND a.kode_jenis_simpan=c.id")->result();
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('admin/laporan/laporan_simpan', $data);
        $this->load->view('template/footer');
    }

    public function simpan_pdf()
    {
        $data['data_laporan'] = $this->db->query("SELECT * FROM simpan a,anggota b, jenis_simpan c where a.kode_anggota=b.nik AND a.kode_jenis_simpan=c.id")->result();
        $this->load->library('pdf');
        $this->pdf->load_view('admin/laporan/export_simpan', $data);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->render();
        $this->pdf->stream("laporan_data_simpanan.pdf");
    }

    public function laporan_pinjam()
    {
        $data['data_laporan'] = $this->db->query("SELECT * FROM pinjam a,anggota b, tenor c where a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND a.status='1'")->result();
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('admin/laporan/laporan_pinjam', $data);
        $this->load->view('template/footer');
    }

    public function pinjam_pdf()
    {
        $data['data_laporan'] = $this->db->query("SELECT * FROM pinjam a,anggota b, tenor c where a.kode_anggota=b.nik AND a.tenor=c.kode_tenor AND a.status='1'")->result();
        $this->load->library('pdf');
        $this->pdf->load_view('admin/laporan/export_pinjam', $data);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->render();
        $this->pdf->stream("laporan_data_peminjaman.pdf");
    }
}
