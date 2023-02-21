<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lihat_Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('NilaiKontrak_model', 'kontrak');
        $this->load->model('NilaiPromosi_model', 'promosi');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'nilai' => $this->db->get_where('nilai_perpanjangan', ['email' => $this->session->userdata('email')])->result_array()

        ];

        $this->load->view('template/header', $data);
        $this->load->view('para_pegawai/lihat_nilai', $data);
        $this->load->view('template/footer', $data);
    }
}
