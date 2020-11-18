<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'vendor';
				$data['title'] = 'Vendor Managements';
				$data['user'] = $user;
				$data['vendor'] = $this->m_vendor->getVendor();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/vendor', $data);
				$this->load->view('include/footer');

			} else {
				redirect('user');
			}
		}
		

	}

	public function addVendor()
	{
		$this->form_validation->set_rules('vendor_code', 'Vendor_code', 'trim|required|is_unique[vendors.vendor_code]');
		
		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Vendor code must be unique!</div>');
			redirect('vendor');
			
		} else {
			$data = [
				'vendor_code' => $this->input->post('vendor_code'),
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'createdAt' => date('Y-m-d'),
				'createdBy' => $this->session->userdata('username')
			];
			$this->m_vendor->save($data);
	
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Vendor created successfully!</div>');
			redirect('vendor');
		}
	}

	public function editVendor()
	{
		$data = [
			'vendor_code' => $this->input->post('vendor_code'),
			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$id = $this->input->post('id');
		$this->m_vendor->update($data, $id);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Vendor updated successfully!</div>');
		redirect('vendor');
		
	}

	public function delVendor($id)
	{	
		$this->m_vendor->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Vendor deleted successfully!</div>');
		redirect('vendor');
	}

}

/* End of file Controllername.php */
