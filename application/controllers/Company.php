<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_company->checkBranchCode();
		$getId = substr($checkId, 3, 4);
		$idNow = $getId+1;
		$data = array('branch_code' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'branch';
				$data['title'] = 'Branch Managements';
				$data['user'] = $user;
				$data['branch'] = $this->m_company->getBranch();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/branch', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addBranch()
	{
		$this->m_company->checkBranchCode();
		$data = [
			'branch_code' => $this->input->post('br_code'),
			'name' => $this->input->post('name'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_company->saveBranch($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Branch created successfully!</div>');
		redirect('company');
	}

	public function delBranch($branch_id)
	{	
		$this->m_company->delBranch($branch_id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Branch deleted successfully!</div>');
		redirect('company');
	}

	public function Dept()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_company->checkDeptCode();
		$getId = substr($checkId, 4, 4);
		$idNow = $getId+1;
		$data = array('dept_code' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'dept';
				$data['title'] = 'Department Managements';
				$data['user'] = $user;
				$data['dept'] = $this->m_company->getDept();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/department', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addDept()
	{
		$this->m_company->checkDeptCode();
		$data = [
			'dept_code' => $this->input->post('dep_code'),
			'name' => $this->input->post('name'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_company->saveDept($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Department created successfully!</div>');
		redirect('company/dept');
	}

	public function delDept($dept_id)
	{	
		$this->m_company->delDept($dept_id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Department deleted successfully!</div>');
		redirect('company/dept');
	}

}

/* End of file Company.php */
