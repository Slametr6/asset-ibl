<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
			
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['asset'] = $this->m_asset->getAsset();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/asset', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['asset'] = $this->m_asset->getAsset();
				
				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/asset', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function Category()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_asset->checkCatId();
		$getId = substr($checkId, 2, 4);
		$idNow = $getId+1;
		$data = array('cat_id' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'category';
				$data['title'] = 'Category Managements';
				$data['user'] = $user;
				$data['category'] = $this->m_asset->getCat();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/category', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addCat()
	{
		$this->m_asset->checkCatId();
		$data = [
			'cat_id' => $this->input->post('cat_code'),
			'cat_name' => $this->input->post('cat_name'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveCat($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category created successfully!</div>');
		redirect('asset/category');
	}

	public function delCat($id)
	{	
		$this->m_asset->delCat($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category deleted successfully!</div>');
		redirect('asset/category');
	}

	public function Location()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_asset->checkLocationId();
		$getId = substr($checkId, 2, 4);
		$idNow = $getId+1;
		$data = array('location_id' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'location';
				$data['title'] = 'Location Managements';
				$data['user'] = $user;
				$data['location'] = $this->m_asset->getLocation();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/location', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addLocation()
	{
		$this->m_asset->checkLocationId();
		$data = [
			'location_id' => $this->input->post('location_code'),
			'description' => $this->input->post('description'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveLocation($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Location created successfully!</div>');
		redirect('asset/location');
	}

	public function delLocation($id)
	{	
		$this->m_asset->delLocation($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Location deleted successfully!</div>');
		redirect('asset/location');
	}

}

/* End of file Asset.php */
