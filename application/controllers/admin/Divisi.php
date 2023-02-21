<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('Divisi_model', 'divisi');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'divisi' => $this->divisi->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/index_divisi', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/tambah_divisi', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('nama_divisi', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('admin/tambah_divisi');
        } else {
            //lolos validasi
            $data = [
                'nama_divisi' => $this->input->post('nama_divisi')
            ];
            $this->divisi->insert($data);
            redirect(base_url('admin/divisi'));
        }
    }

    function edit($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'divisi' => $this->divisi->find_by_id($id)
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/edit_divisi', $data);
        $this->load->view('template/footer', $data);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        //$this->form_validation->set_rules('id_poliklinik', 'ID Poliklinik', 'required');
        $this->form_validation->set_rules('nama_divisi', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->divisi->find_by_id($id);
            $this->load->view('admin/edit_divisi', $data);
        } else {
            //lolos validasi
            $data = [
                'nama_divisi' => $this->input->post('nama_divisi')
            ];
            $this->divisi->update($id, $data);
            redirect(base_url('admin/divisi'));
        }
    }

    function hapus($id)
    {
        $this->divisi->delete($id);
        redirect(base_url('admin/divisi'));
    }
}
