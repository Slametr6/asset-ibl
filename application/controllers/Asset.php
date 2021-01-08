<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_asset->checkNoEq();
		$getId = substr($checkId, 3, 4);
		$idNow = $getId+1;
		$data = array('no_eq' => $idNow);

		if ($username == '') {
			redirect('auth');
			
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['asset'] = $this->m_asset->getAsset();
				$data['cat'] = $this->m_asset->getCat();
				$data['location'] = $this->m_asset->getLocation();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/asset', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['asset'] = $this->m_asset->getAsset();
				$data['cat'] = $this->m_asset->getCat();
				$data['location'] = $this->m_asset->getLocation();

				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/asset', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addAsset()
	{
		$this->m_asset->checkNoEq();
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('eq_code'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'location' => '300001',
			'conditions' => 'ok',
			'status' => 'not_use',
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->save($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asset created successfully!</div>');
		redirect('asset');
	}

	public function editAsset()
	{
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('no_eq'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'location' => $this->input->post('location'),
			'conditions' => $this->input->post('conditions'),
			'status' => $this->input->post('status'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$id = $this->input->post('asset_id');
		$this->m_asset->update($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asset updated successfully!</div>');
		redirect('asset');
	}

	public function delAsset($id)
	{	
		$this->m_asset->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asset deleted successfully!</div>');
		redirect('asset');
	}

	public function userAsset()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');
			
		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'user-asset';
				$data['title'] = 'User Asset Managements';
				$data['user'] = $user;
				$data['userasset'] = $this->m_asset->getUserAsset();
				$data['unit'] = $this->m_asset->getUnit();
				$data['asset'] = $this->m_asset->getAsset();
				$data['employe'] = $this->m_employe->getEmploye();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/user-asset', $data);
				$this->load->view('include/footer');
				
			} else {
				$data['menu'] = 'asset';
				$data['title'] = 'Asset Managements';
				$data['user'] = $user;
				$data['userasset'] = $this->m_asset->getUserAsset();
				$data['unit'] = $this->m_asset->getUnit();
				$data['asset'] = $this->m_asset->getAsset();
				$data['employe'] = $this->m_employe->getEmploye();
				
				$this->load->view('include/header', $data);
				$this->load->view('include/user-sidebar', $data);
				$this->load->view('user/user-asset', $data);
				$this->load->view('include/footer');
			}
		}
		
	}

	public function addUserAsset()
	{
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('eq_code'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'nik' => $this->input->post('nik'),
			'emp_name' => $this->input->post('emp_name'),
			'gender' => $this->input->post('gender'),
			'dept' => $this->input->post('dept'),
			'branch' => $this->input->post('branch'),
			'location' => $this->input->post('location'),
			'qty' => $this->input->post('qty'),
			'unit_id' => $this->input->post('unit_id'),
			'conditions' => $this->input->post('conditions'),
			'status' => $this->input->post('status'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveUserAsset($data);
		var_dump($data);

		// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User asset created successfully!</div>');
		// redirect('asset/userasset');
	}

	public function editUserAsset()
	{
		$data = [
			'category' => $this->input->post('category'),
			'no_eq' => $this->input->post('eq_code'),
			'no_asset' => $this->input->post('no_asset'),
			'sn' => $this->input->post('sn'),
			'descript' => $this->input->post('descript'),
			'nik' => $this->input->post('nik'),
			'emp_name' => $this->input->post('emp_name'),
			'gender' => $this->input->post('gender'),
			'dept' => $this->input->post('dept'),
			'branch' => $this->input->post('branch'),
			'location' => $this->input->post('location'),
			'qty' => $this->input->post('qty'),
			'unit_id' => $this->input->post('unit_id'),
			'conditions' => $this->input->post('conditions'),
			'status' => $this->input->post('status'),
			'updatedAt' => date('Y-m-d'),
			'updatedBy' => $this->session->userdata('username')
		];
		$id = $this->input->post('userasset_id');
		$this->m_asset->updateUserAsset($data, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User asset updated successfully!</div>');
		redirect('asset/userasset');
	}

	public function delUserAsset($id)
	{	
		$this->m_asset->deleteUserAsset($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User asset deleted successfully!</div>');
		redirect('asset/userasset');
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

	public function Unit()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'unit';
				$data['title'] = 'Unit Managements';
				$data['user'] = $user;
				$data['unit'] = $this->m_asset->getUnit();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/unit', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addUnit()
	{
		$data = [
			'unit' => $this->input->post('unit'),
			'description' => $this->input->post('description'),
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_asset->saveUnit($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit created successfully!</div>');
		redirect('asset/unit');
	}

	public function delUnit($id)
	{	
		$this->m_asset->delUnit($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit deleted successfully!</div>');
		redirect('asset/unit');
	}

}

/* End of file Asset.php */
