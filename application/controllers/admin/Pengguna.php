<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model divisi_model,nama objeknya = divisi
        $this->load->model('Pengguna_model', 'pengguna');
        $this->load->model('Role_model', 'role');
    }

    public function index()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pengguna' => $this->pengguna->find_all()

        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/index_pengguna', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah()
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'role' => $this->role->find_all()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/tambah_pengguna', $data);
        $this->load->view('template/footer', $data);
    }

    function tambah_save()
    {
        //validasi server side
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email sudah terpakai'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[pass]', [
            'matches' => 'password tidak sama!',
            'min_length' => 'password to short'
        ]);
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $this->load->view('admin/tambah_pengguna');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'email' => htmlspecialchars($email),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => $this->input->post('nama', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', true),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->pengguna->insert($data);
            redirect(base_url('admin/pengguna'));
        }
    }

    function edit($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pengguna' => $this->pengguna->find_by_id($id),
            'role' => $this->role->find_all()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/edit_pengguna', $data);
        $this->load->view('template/footer', $data);
    }

    //menyimpan data pada form edit
    function edit_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->pengguna->find_by_id($id);
            $this->load->view('admin/edit_pengguna', $data);
        } else {
            //lolos validasi
            //$email = $this->input->post('email');
            $data = [
                //'email' => htmlspecialchars($email),
                'username' => htmlspecialchars($this->input->post('username')),
                'nama' => $this->input->post('nama'),
                //'image' => $this->input->post('image'),
                //'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id')
                //'is_active' => 1,
                //'date_created' => time()
            ];
            $this->pengguna->update($id, $data);
            redirect(base_url('admin/pengguna'));
        }
    }

    function hapus($id)
    {
        $this->pengguna->delete($id);
        redirect(base_url('admin/pengguna'));
    }

    function changepassword($id)
    {
        $data = [
            'user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'pengguna' => $this->pengguna->find_by_id($id),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('admin/changepassword', $data);
        $this->load->view('template/footer', $data);
    }

    function change_save()
    {
        //validasi server side
        $id = $this->input->post('id');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            //validasi menemukan error
            $data = $this->pengguna->find_by_id($id);
            $this->load->view('admin/changepassword', $data);
        } else {
            //lolos validasi
            //$email = $this->input->post('email');
            $data = [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->pengguna->update($id, $data);
            redirect(base_url('admin/pengguna'));
        }
    }
}
