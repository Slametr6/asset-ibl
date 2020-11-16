<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'admin';
				$data['title'] = 'Admin Profile';
				$data['user'] = $user;
				
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/index', $data);
				$this->load->view('include/footer'); 
				
			} else {
				redirect('user');
			}
		}

	}

	public function user()
	{
		$data['menu'] = 'user';
		$data['title'] = 'User Managements';
		$data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		// $this->db->where('id !=', 1);
		$data['data'] = $this->db->get('users')->result();
		
		$this->load->view('include/header', $data);
		$this->load->view('include/sidebar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('include/footer'); 
	}

	public function addUser()
	{
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
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Username must be unique!</div>');
			redirect('admin/user');

		} else {
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

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation account created successfully!</div>');
			redirect('admin/user');
		}
	}

	public function editUser()
	{
		$this->form_validation->set_rules('name', 'Full name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user');

		} else {
			$upload_img = $_FILES['image']['name'];
			if ($upload_img) {
				$config['upload_path'] = '.assets/images/profile/';
				$config['allowed_type'] = 'gif|jpg|png';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$def_img = $data['user']['image'];
					if ($def_img) {
						unlink(FCPATH.'assets/images/profile/'.$def_img);
					}
					$new_img = $this->upload->data('file_name');
					$this->db->set('image', $new_img);

				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'name' => htmlspecialchars($this->input->post('name', TRUE)),
				'username' => htmlspecialchars($this->input->post('username', TRUE)),
				'email' => htmlspecialchars($this->input->post('email', TRUE)),
				'phone' => htmlspecialchars($this->input->post('phone', TRUE)),
				'address' => htmlspecialchars($this->input->post('address', TRUE)),
				'dept' => htmlspecialchars($this->input->post('dept', TRUE)),
				'position' => htmlspecialchars($this->input->post('position', TRUE)),
				'updatedat' => date('Y-m-d'),
				'updatedby' => $this->session->userdata('username')
			];
			$id = $this->input->post('id');
			$this->db->update('users', $data, ['id' => $id]);
					
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User updated successfully!</div>');
			redirect('admin/user');
		}
		
	}

	public function delUser($id)
	{	
		$this->db->delete('users', ['id' => $id]);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User deleted successfully!</div>');
		redirect('admin/user');
	}

}
