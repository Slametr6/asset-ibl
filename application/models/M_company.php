<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_company extends CI_Model {

	public function getBranch($id = '')
	{
		if ($id) {
			return $this->db->get_where('branch', ['id' => $id])->row_array();
		} else {
			return $this->db->get('branch')->result();
		}
	}

	public function checkBranchId()
	{
		$branch_id = $this->db->query('SELECT MAX(branch_id) as branch_code FROM branch')->row();
		return $branch_id->branch_code;
	}

	public function saveBranch($data)
	{
		return $this->db->insert('branch', $data);
	}

	public function delBranch($id)
	{
		return $this->db->delete('branch', ['id' => $id]);
	}

	public function getDept($id = '')
	{
		if ($id) {
			return $this->db->get_where('department', ['id' => $id])->row_array();
		} else {
			return $this->db->get('department')->result();
		}
	}

	public function checkDeptId()
	{
		$dept_id = $this->db->query('SELECT MAX(dept_id) as dept_code FROM department')->row();
		return $dept_id->dept_code;
	}
	
	public function saveDept($data)
	{
		return $this->db->insert('department', $data);
	}

	public function delDept($id)
	{
		return $this->db->delete('department', ['id' => $id]);
	}

}

/* End of file M_company.php */
