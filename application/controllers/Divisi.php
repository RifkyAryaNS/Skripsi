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
        $this->load->view('divisi/index', $data);
        $this->load->view('template/footer', $data);
    }

    function edit()
    {
        $data1 = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array()
        ];
        $id = $this->uri->segment(3);
        $data = $this->divisi->find_by_id($id);
        $this->load->view('template/header', $data1);
        $this->load->view('divisi/edit', $data);
        $this->load->view('template/footer', $data1);
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
            $this->load->view('divisi/edit', $data);
        } else {
            //lolos validasi
            $data = [
                //'id_poliklinik' => $this->input->post('id_poliklinik'),
                'nama_divisi' => $this->input->post('nama_divisi')
                //'alamat' => $this->input->post('alamat'),
                //'tgl_lahir' => $this->input->post('tgl_lahir')
            ];
            $this->divisi->update($id, $data);
            redirect(base_url('divisi'));
        }
    }
}
