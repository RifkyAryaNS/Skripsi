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
        $this->load->view('jabatan/index', $data);
        $this->load->view('template/footer', $data);
    }
}
