<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'request';
				$data['title'] = 'Form Request Managements';
				$data['user'] = $user;
				$data['request'] = $this->m_request->getRequest();
				$data['products'] = $this->m_product->getProduct();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/form-request', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'request';
				$data['title'] = 'Form Request Managements';
				$data['user'] = $user;
				$data['request'] = $this->m_request->getRequest();
				$data['products'] = $this->m_product->getProduct();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/form-request', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addRequest()
	{
		$data = [
			'name' => $this->input->post('name'),
			'dept' => $this->input->post('dept'),
			'position' => $this->input->post('position'),
			'product_name' => $this->input->post('product_name'),
			'spec' => $this->input->post('spec'),
			'brand' => $this->input->post('brand'),
			'qty' => $this->input->post('qty'),
			'allocation' => $this->input->post('allocation'),
			'note' => $this->input->post('note'),
			'is_approved' => 0,
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_request->save($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request created successfully!</div>');
		redirect('request');
	}

	public function editRequest()
	{
		$data = [
			'name' => $this->input->post('name'),
			'dept' => $this->input->post('dept'),
			'position' => $this->input->post('position'),
			'product_name' => $this->input->post('product_name'),
			'spec' => $this->input->post('spec'),
			'brand' => $this->input->post('brand'),
			'qty' => $this->input->post('qty'),
			'allocation' => $this->input->post('allocation'),
			'note' => $this->input->post('note')
		];
		$id = $this->input->post('id');
		$this->m_request->update($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request updated successfully!</div>');
		redirect('request');
	}

	public function delRequest($id)
	{	
		$this->m_request->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Request deleted successfully!</div>');
		redirect('request');
	}

}

/* End of file Controllername.php */
