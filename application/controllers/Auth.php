<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('admin/user');
		} 

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = 'login';
			$data['title'] = 'Login Page';
			$this->load->view('include/auth-header', $data);
			$this->load->view('auth/login');
			$this->load->view('include/auth-footer');

		} else {
			$this->_cekLogin();
		}
	}

	private function _cekLogin()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		//jika user ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($pass, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						redirect('admin');

					} else {
						redirect('user');
					}

				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not activating!</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered!</div>');
			redirect('auth');
		}
	}

	public function register() 
	{
		if ($this->session->userdata('username')) {
			redirect('admin/user');
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[password1]',[
			'matches' => 'Password diferent!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password]',[
			'matches' => 'Password diferent!',
			'min_length' => 'Password too short!'
		]);
		
		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = 'register';
			$data['title'] = 'Registration Page';
			$this->load->view('include/auth-header', $data);
			$this->load->view('auth/register');
			$this->load->view('include/auth-footer');

		} else {
			$username = $this->input->post('username');
			$data = [
				'name' => htmlspecialchars($this->input->post('name', TRUE)),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'avatar.png',
				'role_id' => 2,
				'is_active' => 1,
				'createdat' => date('Y-m-d'),
				'createdby' => $this->session->userdata('username')
			];
			$this->db->insert('users', $data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation account created successfully! Please login</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout successfully</div>');
		redirect('auth');
	}

}
