<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		$checkId = $this->m_employe->checkEmployeId();
		$getId = substr($checkId, 2, 6);
		$idNow = $getId + 1;
		$data = array('employe_id' => $idNow);

		if ($username == '') {
			redirect('auth');

		} else {
			if ($user['role_id'] == 1) {
				$data['menu'] = 'employee';
				$data['title'] = 'Employee Managements';
				$data['user'] = $user;
				$data['employe'] = $this->m_employe->getEmploye();
				$data['dept'] = $this->m_company->getDept();
				$data['branch'] = $this->m_company->getBranch();
		
				$this->load->view('include/header', $data);
				$this->load->view('include/sidebar', $data);
				$this->load->view('admin/employe', $data);
				$this->load->view('include/footer');
				
			} else {
				redirect('user');
			}
		}
		
	}

	public function addEmploye()
	{
		$this->m_employe->checkEmployeId();
		$data = [
			'employe_id' => $this->input->post('employe_code'),
			'nik' => $this->input->post('nik'),
			'emp_name' => $this->input->post('emp_name'),
			'gender' => $this->input->post('gender'),
			'birthday' => $this->input->post('birthday'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'dept' => $this->input->post('dept'),
			'branch' => $this->input->post('branch'),
			'image' => 'avatar.png',
			'createdAt' => date('Y-m-d'),
			'createdBy' => $this->session->userdata('username')
		];
		$this->m_employe->save($data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employe created successfully!</div>');
		redirect('employe');
	}

	public function editEmploye()
	{
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		$this->form_validation->set_rules('emp_name', 'Full name', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/user');

		} else {
			$upload_img = $_FILES['image']['name'];

			if ($upload_img) {
				$config['upload_path'] = 'assets/images/profile/';
				$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG';
				$config['max_size'] = '1024';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$def_img = $user['image'];
					if ($def_img != 'avatar.png') {
						unlink(FCPATH.'assets/images/profile/'.$def_img);
					}
					$new_img = $this->upload->data('file_name');
					$this->db->set('image', $new_img);

				} else {
					echo $this->upload->display_errors();
				}
			}
			$data = [
				'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
				'emp_name' => htmlspecialchars($this->input->post('emp_name', TRUE)),
				'gender' => htmlspecialchars($this->input->post('gender', TRUE)),
				'birthday' => htmlspecialchars($this->input->post('birthday', TRUE)),
				'email' => htmlspecialchars($this->input->post('email', TRUE)),
				'phone' => htmlspecialchars($this->input->post('phone', TRUE)),
				'address' => htmlspecialchars($this->input->post('address', TRUE)),
				'dept' => htmlspecialchars($this->input->post('dept', TRUE)),
				'branch' => htmlspecialchars($this->input->post('branch', TRUE)),
				'updatedat' => date('Y-m-d'),
				'updatedby' => $username
			];
			$id = $this->input->post('employe_id');
			$this->m_employe->update($data, $id);			
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employee updated successfully!</div>');
			redirect('employe');
		}
		
	}

	public function delEmploye($id)
	{	
		$this->m_employe->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employe deleted successfully!</div>');
		redirect('employe');
	}

}

/* End of file Employe.php */
