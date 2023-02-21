<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_Kontrak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('NilaiKontrak_model', 'kontrak');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'kontrak' => $this->kontrak->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_kontrak/index', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pegawai' => $this->pegawai->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_kontrak/tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('kedisiplinan', 'Kedisiplinan', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('nilai_kontrak/tambah');
        } else {
            //lolos validasi
            $data = [
                'id_pegawai' => $this->input->post('id_pegawai'),
                'kedisiplinan' => $this->input->post('kedisiplinan'),
                'integritas' => $this->input->post('integritas'),
                'tanggung_jawab' => $this->input->post('tanggung_jawab'),
                'komunikasi' => $this->input->post('komunikasi'),
                'antusiasme' => $this->input->post('antusiasme'),
                'pelayanan_konsumen' => $this->input->post('pelayanan_konsumen'),
                'pengetahuan' => $this->input->post('pengetahuan'),
                'efi_efk' => $this->input->post('efi_efk'),
                'kerjasama' => $this->input->post('kerjasama'),
                'tindak_lanjut' => $this->input->post('tindak_lanjut'),
                'tgs_khusus' => $this->input->post('tgs_khusus'),
                'alur_waktu' => $this->input->post('alur_waktu'),
                'kreatif' => $this->input->post('kreatif'),
                'dokumen' => $this->input->post('dokumen'),
                'alat_kerja' => $this->input->post('alat_kerja'),
                'persuasif' => $this->input->post('persuasif')
            ];
            $this->kontrak->insert($data);
            redirect(base_url('nilai_kontrak'));
        }
    }

    function edit()
    {
        $data1 = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];

        $id = $this->uri->segment(3);
        $data = $this->kontrak->find_by_id($id);
        $this->load->view('template/header', $data1);
        $this->load->view('nilai_kontrak/edit', $data);
        $this->load->view('template/footer', $data1);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        //$this->form_validation->set_rules('id_poliklinik', 'ID Poliklinik', 'required');
        $this->form_validation->set_rules('kedisiplinan', 'Kedisiplinan', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->kontrak->find_by_id($id);
            $this->load->view('nilai_kontrak/edit', $data);
        } else {
            //lolos validasi
            $data = [
                //'id_poliklinik' => $this->input->post('id_poliklinik'),
                'kedisiplinan' => $this->input->post('kedisiplinan'),
                'integritas' => $this->input->post('integritas'),
                'tanggung_jawab' => $this->input->post('tanggung_jawab'),
                'komunikasi' => $this->input->post('komunikasi'),
                'antusiasme' => $this->input->post('antusiasme'),
                'pelayanan_konsumen' => $this->input->post('pelayanan_konsumen'),
                'pengetahuan' => $this->input->post('pengetahuan'),
                'efi_efk' => $this->input->post('efi_efk'),
                'kerjasama' => $this->input->post('kerjasama'),
                'tindak_lanjut' => $this->input->post('tindak_lanjut'),
                'tgs_khusus' => $this->input->post('tgs_khusus'),
                'alur_waktu' => $this->input->post('alur_waktu'),
                'kreatif' => $this->input->post('kreatif'),
                'dokumen' => $this->input->post('dokumen'),
                'alat_kerja' => $this->input->post('alat_kerja'),
                'persuasif' => $this->input->post('persuasif')
            ];
            $this->kontrak->update($id, $data);
            redirect(base_url('nilai_kontrak'));
        }
    }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->kontrak->delete($id);
        redirect(base_url('nilai_kontrak'));
    }

    public function hasil_penilaian()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'kontrak' => $this->kontrak->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_kontrak/hasil_penilaian', $data);
        $this->load->view('template/footer', $data);
    }

    public function rekomendasi()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'kontrak' => $this->kontrak->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('nilai_kontrak/rekomendasi', $data);
        $this->load->view('template/footer', $data);
    }
}
