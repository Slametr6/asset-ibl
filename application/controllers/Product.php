<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
			
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'product';
				$data['title'] = 'Product Managements';
				$data['user'] = $user;
				$data['product'] = $this->m_product->getProduct();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/product', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'product';
				$data['title'] = 'Product Managements';
				$data['user'] = $user;
				$data['product'] = $this->m_product->getProduct();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('admin/product', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addProduct()
	{
		$data = [
			'product_code' => $this->input->post('product_code'),
			'type' => $this->input->post('type'),
			'brand' => $this->input->post('brand'),
			'name' => $this->input->post('name'),
			'vendor_name' => $this->input->post('vendor_name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'date_in' => $this->input->post('date_in'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_product->save($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product created successfully!</div>');
		redirect('product');
	}

	public function editProduct()
	{
		$data = [
			'product_code' => $this->input->post('product_code'),
			'type' => $this->input->post('type'),
			'brand' => $this->input->post('brand'),
			'name' => $this->input->post('name'),
			'vendor_name' => $this->input->post('vendor_name'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty'),
			'date_in' => $this->input->post('date_in'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$id = $this->input->post('id');
		$this->m_product->update($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product updated successfully!</div>');
		redirect('product');
	}

	public function delProduct($id)
	{	
		$this->m_product->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product deleted successfully!</div>');
		redirect('product');
	}

}

/* End of file Controllername.php */
