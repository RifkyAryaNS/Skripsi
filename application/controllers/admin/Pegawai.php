<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Divisi_model', 'divisi');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pegawai' => $this->pegawai->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/index_pegawai', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'divisi' => $this->divisi->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/tambah_pegawai', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('admin/tambah_pegawai');
        } else {
            //lolos validasi
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'divisi' => $this->input->post('divisi')
                // 'tempat_lahir' => $this->input->post('tempat_lahir'),
                // 'ttl' => $this->input->post('ttl'),
                // 'jk' => $this->input->post('jk'),
                // 'alamat' => $this->input->post('alamat')
            ];
            $this->pegawai->insert($data);
            redirect(base_url('admin/pegawai'));
        }
    }


    function edit($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pegawai' => $this->pegawai->find_by_id($id),
            'divisi' => $this->divisi->find_all()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/edit_pegawai', $data);
        $this->load->view('template/footer', $data);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        // $this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'required');
        //$this->form_validation->set_rules('id_divisi', 'ID Divisi', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->pegawai->find_by_id($id);
            $this->load->view('admin/edit_pegawai', $data);
        } else {
            //lolos validasi
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'divisi' => $this->input->post('divisi')
                //'tempat_lahir' => $this->input->post('tempat_lahir'),
                //'ttl' => $this->input->post('ttl'),
                //'jk' => $this->input->post('jk'),
                //'alamat' => $this->input->post('alamat')
            ];
            $this->pegawai->update($id, $data);
            redirect(base_url('admin/pegawai'));
        }
    }

    function hapus($id)
    {
        $this->pegawai->delete($id);
        redirect(base_url('admin/pegawai'));
    }
}
