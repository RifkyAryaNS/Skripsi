<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function editProfile()
	{
		$data['user'] =  $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required|trim');
		$this->form_validation->set_rules('ttl', 'Ttl', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('rt', 'Rt', 'required|trim');
		$this->form_validation->set_rules('rw', 'Rw', 'required|trim');
		$this->form_validation->set_rules('nohp', 'Nohp', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('profile/edit', $data);
			$this->load->view('template/footer', $data);
		} else {
			//$id_jk = $this->input->post('id_jk');
			$username = $this->input->post('username');
			$nik = $this->input->post('nik');
			$nama = $this->input->post('nama');
			$tempat = $this->input->post('tempat');
			$ttl = $this->input->post('ttl');
			$alamat = $this->input->post('alamat');
			$rt = $this->input->post('rt');
			$rw = $this->input->post('rw');
			$nohp = $this->input->post('nohp');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['upload_path']          = './assets/img/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 2048;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			//$this->db->set('id_jk', $id_jk);
			$this->db->set('username', $username);
			$this->db->set('nik', $nik);
			$this->db->set('nama', $nama);
			$this->db->set('tempat', $tempat);
			$this->db->set('ttl', $ttl);
			$this->db->set('alamat', $alamat);
			$this->db->set('rt', $rt);
			$this->db->set('rw', $rw);
			$this->db->set('nohp', $nohp);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert
            alert-success" role="alert">Profile berhasil di update</div>');
			redirect('profile');
		}
	}

	public function changepassword()
	{
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_pass1', 'New Password', 'required|trim|min_length[3]|matches[new_pass2]');
		$this->form_validation->set_rules('new_pass2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_pass1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('profile/changepassword', $data);
			$this->load->view('template/footer', $data);
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_pass1');

			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert
				alert-danger" role="alert">Password lama salah</div>');
				redirect('profile/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert
				alert-danger" role="alert">Password baru tidak boleh sama dengan password yang dulu</div>');
					redirect('profile/changepassword');
				} else {
					//pass yang bener
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert
					alert-success" role="alert">Password berhasil di ganti</div>');
					redirect('profile/changepassword');
				}
			}
		}
	}
}
