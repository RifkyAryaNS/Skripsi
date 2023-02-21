<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pegawai' => $this->pegawai->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'divisi' => $this->pegawai->getAllDivisi()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('pegawai/tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('pegawai/tambah');
        } else {
            //lolos validasi
            $data = [
                'nama' => $this->input->post('nama'),
                //'jabatan' => $this->input->post('jabatan'),
                'divisi' => $this->input->post('divisi')
                // 'tempat_lahir' => $this->input->post('tempat_lahir'),
                // 'ttl' => $this->input->post('ttl'),
                // 'jk' => $this->input->post('jk'),
                // 'alamat' => $this->input->post('alamat')
            ];
            $this->pegawai->insert($data);
            redirect(base_url('pegawai'));
        }
    }

    function edit()
    {
        $data1 = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $id_pegawai = $this->uri->segment(3);
        $data = $this->pegawai->find_by_id($id_pegawai);
        $this->load->view('template/header', $data1);
        $this->load->view('pegawai/edit', $data);
        $this->load->view('template/footer', $data1);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        //$this->form_validation->set_rules('id_poliklinik', 'ID Poliklinik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->pegawai->find_by_id($id);
            $this->load->view('pegawai/edit', $data);
        } else {
            //lolos validasi
            $data = [
                //'id_poliklinik' => $this->input->post('id_poliklinik'),
                'nama' => $this->input->post('nama'),
                'divisi' => $this->input->post('divisi')
                //'alamat' => $this->input->post('alamat'),
                //'tgl_lahir' => $this->input->post('tgl_lahir')
            ];
            $this->pegawai->update($id, $data);
            redirect(base_url('pegawai'));
        }
    }

    // function edit($id_pegawai)
    // {
    //     $data = [
    //         'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
    //         'pegawai' => $this->pegawai->find_by_id($id_pegawai)
    //     ];
    //     $this->load->view('template/header', $data);
    //     $this->load->view('pegawai/edit', $data);
    //     $this->load->view('template/footer', $data);
    // }

    // //menyimpan data pada form edit
    // function edit_save()
    // {
    //     //validasi server side
    //     $id_pegawai = $this->input->post('id_pegawai');
    //     // $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
    //     //$this->form_validation->set_rules('id_divisi', 'ID Divisi', 'required');
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     if ($this->form_validation->run() == FALSE) {
    //         //validasi menemukan error
    //         $data = $this->pegawai->find_by_id($id_pegawai);
    //         $this->load->view('pegawai/edit', $data);
    //     } else {
    //         //lolos validasi
    //         $data = [
    //             'nama' => $this->input->post('nama'),
    //             'jabatan' => $this->input->post('jabatan'),
    //             'divisi' => $this->input->post('divisi'),
    //             'tempat_lahir' => $this->input->post('tempat_lahir'),
    //             'ttl' => $this->input->post('ttl'),
    //             'jk' => $this->input->post('jk'),
    //             'alamat' => $this->input->post('alamat')
    //         ];
    //         $this->pegawai->update($id_pegawai, $data);
    //         redirect(base_url('pegawai'));
    //     }
    // }

    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->pegawai->delete($id);
        redirect(base_url('pegawai'));
    }
}
