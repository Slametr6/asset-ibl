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
		
		$data['menu'] = 'home';
		$data['title'] = 'User Panel Management';
		$data['user'] = $user;
		$data['dept'] = $this->m_company->getDept();
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
		$this->load->view('include/user-sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('include/footer'); 
	}

	public function manager()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
		} 
		
		$data['menu'] = 'home';
		$data['title'] = 'Head of Division Management';
		$data['user'] = $user;
		$data['dept'] = $this->m_company->getDept();
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
		$this->load->view('include/mgr-sidebar', $data);
		$this->load->view('manager/index', $data);
		$this->load->view('include/footer'); 
	}

}

/* End of file Controllername.php */
