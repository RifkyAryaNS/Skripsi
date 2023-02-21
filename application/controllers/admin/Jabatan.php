<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('jabatan_model', 'jabatan');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'jabatan' => $this->jabatan->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/index_jabatan', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/tambah_jabatan', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('nama_jabatan', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('admin/tambah_jabatan');
        } else {
            //lolos validasi
            $data = [
                'id_divisi' => $this->input->post('id_divisi'),
                'nama_jabatan' => $this->input->post('nama_jabatan')
            ];
            $this->jabatan->insert($data);
            redirect(base_url('admin/jabatan'));
        }
    }

    function edit($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'jabatan' => $this->jabatan->find_by_id($id)
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/edit_jabatan', $data);
        $this->load->view('template/footer', $data);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        //$this->form_validation->set_rules('id_poliklinik', 'ID Poliklinik', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->jabatan->find_by_id($id);
            $this->load->view('admin/edit_jabatan', $data);
        } else {
            //lolos validasi
            $data = [
                'id_divisi' => $this->input->post('id_divisi'),
                'nama_jabatan' => $this->input->post('nama_jabatan')
            ];
            $this->jabatan->update($id, $data);
            redirect(base_url('admin/jabatan'));
        }
    }

    function hapus($id)
    {
        $this->jabatan->delete($id);
        redirect(base_url('admin/jabatan'));
    }
}
