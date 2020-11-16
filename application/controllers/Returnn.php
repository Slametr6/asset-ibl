<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Returnn extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			
			if ($user['role_id'] == 1) {
				$data['menu'] = 'return';
				$data['title'] = 'Form Return Managements';
				$data['user'] = $user;
				$data['return'] = $this->m_return->getReturn();

				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/form-return', $data);
				$this->load->view('include/footer');

			} else {
				$data['menu'] = 'return';
				$data['title'] = 'Form Return Managements';
				$data['user'] = $user;
				$data['return'] = $this->m_return->getReturn();

				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/form-return', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addReturn()
	{
		$id = $this->input->post('id');
		$request = $this->m_request->getRequest($id);
		
		if ($request['is_approved'] == 1) {
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
				'receiver' => $this->input->post('receiver'),
				'is_accepted' => 0,
				'createdAt' => date('Y-m-d'),
				'createdBy' => $this->session->userdata('username')
			];
			$this->m_return->save($data, $request);
	
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Return created successfully!</div>');
			redirect('returnn');

		} else {
			if ($request['is_approved'] == null) {
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
					'receiver' => $this->input->post('receiver'),
					'is_accepted' => 0,
					'createdAt' => date('Y-m-d'),
					'createdBy' => $this->session->userdata('username')
				];
				$this->m_return->save($data, $request);
		
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Return created successfully!</div>');
				redirect('returnn');

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Return created failed! Request has not been approved.</div>');
				redirect('returnn');

			}

		}
		
	}

	public function editReturn()
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
			'receiver' => $this->input->post('receiver')
		];
		$id = $this->input->post('id');
		$this->m_return->update($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Return updated successfully!</div>');
		redirect('returnn');
	}

	public function delReturn($id)
	{	
		$this->m_return->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Return deleted successfully!</div>');
		redirect('returnn');
	}

}

/* End of file Controllername.php */
