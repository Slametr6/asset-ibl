<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} 
		
		$data['menu'] = 'user';
		$data['title'] = 'User Profile';
		$data['user'] = $user;
		$data['dept'] = $this->m_company->getDept();
		
		$this->load->view('include/header', $data);
		$this->load->view('include/user-sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('include/footer'); 
	}

}

/* End of file Controllername.php */
