<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_Promosi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('NilaiPromosi_model', 'promosi');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'promosi' => $this->promosi->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_promosi/index', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pegawai' => $this->pegawai->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_promosi/tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('pengalaman_kerja', 'pengalaman kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('nilai_promosi/tambah');
        } else {
            //lolos validasi
            $data = [
                'id_pegawai' => $this->input->post('id_pegawai'),
                'pengalaman_kerja' => $this->input->post('pengalaman_kerja'),
                'loyalitas' => $this->input->post('loyalitas'),
                'jujur' => $this->input->post('jujur'),
                'kreatif_inisiatif' => $this->input->post('kreatif_inisiatif'),
                'memberi_solusi' => $this->input->post('memberi_solusi'),
                'profesional' => $this->input->post('profesional')
            ];
            $this->promosi->insert($data);
            redirect(base_url('nilai_promosi'));
        }
    }

    function edit()
    {
        $data1 = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $id = $this->uri->segment(3);
        $data = $this->promosi->find_by_id($id);
        $this->load->view('template/header', $data1);
        $this->load->view('nilai_promosi/edit', $data);
        $this->load->view('template/footer', $data1);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        //$this->form_validation->set_rules('id_poliklinik', 'ID Poliklinik', 'required');
        $this->form_validation->set_rules('pengalaman_kerja', 'pengalaman kerja', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->promosi->find_by_id($id);
            $this->load->view('nilai_promosi/edit', $data);
        } else {
            //lolos validasi
            $data = [
                //'id_poliklinik' => $this->input->post('id_poliklinik'),
                'id_pegawai' => $this->input->post('id_pegawai'),
                'pengalaman_kerja' => $this->input->post('pengalaman_kerja'),
                'loyalitas' => $this->input->post('loyalitas'),
                'jujur' => $this->input->post('jujur'),
                'kreatif_inisiatif' => $this->input->post('kreatif_inisiatif'),
                'memberi_solusi' => $this->input->post('memberi_solusi'),
                'profesional' => $this->input->post('profesional')
            ];
            $this->promosi->update($id, $data);
            redirect(base_url('nilai_promosi'));
        }
    }

    public function hasil_penilaian()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'promosi' => $this->promosi->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_promosi/hasil_penilaian', $data);
        $this->load->view('template/footer', $data);
    }

    public function rekomendasi()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'promosi' => $this->promosi->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_promosi/rekomendasi', $data);
        $this->load->view('template/footer', $data);
    }
}
