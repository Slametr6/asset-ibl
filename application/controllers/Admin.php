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
				$data['menu'] = 'home';
				$data['title'] = 'Admin Panel';
				$data['user'] = $user;
				$data['totalemp'] = $this->db->count_all_results('employees');
				
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
		$data['auth'] = $this->m_auth->getUser();
		
		$this->load->view('include/header', $data);
		$this->load->view('include/sidebar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('include/footer'); 
	}

	public function addUser()
	{
		$this->form_validation->set_rules('user', 'Full Name', 'trim|required');
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
				'user' => htmlspecialchars($this->input->post('user', TRUE)),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'image' => 'avatar.png',
				'role_id' => 2,
				'is_active' => 1,
				'createdat' => date('Y-m-d'),
				'createdby' => $this->session->userdata('username')
			];
			$this->m_auth->save($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation account created successfully!</div>');
			redirect('admin/user');
		}
	}

	public function editUser()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		$this->form_validation->set_rules('user', 'Full name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user');

		} else {
			$upload_img = $_FILES['image']['name'];

			if ($upload_img) {
				$config['upload_path'] = 'assets/images/profile/';
				$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$def_img = $user['image'];
					if ($def_img != 'avatar.png') {
						unlink(FCPATH.'assets/images/profile/'.$def_img);
					}
					$new_img = $this->upload->data('file_name');
					$this->db->set('image', $new_img);

				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'user' => htmlspecialchars($this->input->post('user', TRUE)),
				'username' => htmlspecialchars($this->input->post('username', TRUE)),
				'is_active' => htmlspecialchars($this->input->post('is_active', TRUE)),
				'email' => htmlspecialchars($this->input->post('email', TRUE)),
				'updatedat' => date('Y-m-d'),
				'updatedby' => $username
			];
			$id = $this->input->post('user_id');
			$this->m_auth->update($data, $id);
			// var_dump($data, $id);			
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User updated successfully!</div>');
			redirect('admin/user');
		}
		
	}

	public function delUser($id)
	{
		$this->m_auth->delete($id);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User deleted successfully!</div>');
		redirect('admin/user');
	}
	
	// public function editProfile()
	// {
	// 	$username = $this->session->userdata('username');
	// 	$user = $this->db->get_where('users', ['username' => $username])->row_array();
	// 	$this->form_validation->set_rules('name', 'Full name', 'trim|required');
		
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->load->view('admin');

	// 	} else {
	// 		$upload_img = $_FILES['image']['name'];

	// 		if ($upload_img) {
	// 			$config['upload_path'] = 'assets/images/profile/';
	// 			$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
	// 			$config['max_size'] = '1024';

	// 			$this->load->library('upload', $config);
	// 			if ($this->upload->do_upload('image')) {
	// 				$def_img = $user['image'];
	// 				if ($def_img != 'avatar.png') {
	// 					unlink(FCPATH.'assets/images/profile/'.$def_img);
	// 				}
	// 				$new_img = $this->upload->data('file_name');
	// 				$this->db->set('image', $new_img);

	// 			} else {
	// 				echo $this->upload->display_errors();
	// 			}
	// 		}
	// 		$data = [
	// 			'name' => htmlspecialchars($this->input->post('name', TRUE)),
	// 			'username' => htmlspecialchars($this->input->post('username', TRUE)),
	// 			'email' => htmlspecialchars($this->input->post('email', TRUE)),
	// 			'dept' => htmlspecialchars($this->input->post('dept', TRUE)),
	// 			'updatedat' => date('Y-m-d'),
	// 			'updatedby' => $username
	// 		];
	// 		$id = $this->input->post('id');
	// 		$this->m_auth->update($data, $id);			
			
	// 		if($user['role_id'] == 1) {
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile updated successfully!</div>');
	// 			redirect('admin');

	// 		} else {
	// 			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile updated successfully!</div>');
	// 			redirect('user');
	// 		}
	// 	}
	// }

	public function changePassword()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm Password', 'trim|required|matches[new_password1]');
		
		if ($this->form_validation->run() == FALSE) {
			if($user['role_id'] == 1) {
				redirect('admin');

			} else {
				redirect('user');
			}

		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $user['password'])) {
				if($user['role_id'] == 1) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
					redirect('admin');
	
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
					redirect('user');
				}

			} else {
				// password tidak boleh sama
				if ($current_password == $new_password) {
					if($user['role_id'] == 1) {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password must be diferent from current password!</div>');
						redirect('admin');
		
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password must be diferent from current password!</div>');
						redirect('user');
					}

				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$password = $this->input->post('password', $password_hash);

					$this->db->set('password', $password_hash)
								->where('username', $username)
								->update('users');

					if($user['role_id'] == 1) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed successfully</div>');
						redirect('admin');

					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed successfully</div>');
						redirect('user');
					}

				}
			}
		}
		
	}

	public function resetPassword()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password failed to reset!</div>');
			redirect('admin/user');
			
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

			$this->db->set('password', $password)
						->where('username', $username)
						->update('users');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been reseted!</div>');
			redirect('admin/user');

		}
	}
}
