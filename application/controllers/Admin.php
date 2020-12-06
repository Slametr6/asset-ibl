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
				$data['totalasset'] = $this->db->count_all_results('assets');
				$data['assetuse'] = $this->db->select('*')
										->from('assets')
										->like('status', 'in_use')
										->count_all_results();
				$data['notuse'] = $this->db->select('*')
										->from('assets')
										->like('status', 'not_use')
										->count_all_results();
				
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
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'user';
				$data['title'] = 'User Managements';
				$data['user'] = $user;
				$data['auth'] = $this->m_auth->getUser();
				$data['role'] = $this->db->get('user_role')->result();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/user', $data);
				$this->load->view('include/footer'); 
				
			} else {
				redirect('user');
			}
		}

	}

}
