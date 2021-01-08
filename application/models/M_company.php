<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_company extends CI_Model {

	public function getBranch($branch_id = '')
	{
		if ($branch_id) {
			return $this->db->get_where('branch', ['branch_id' => $branch_id])->row_array();
		} else {
			return $this->db->get('branch')->result();
		}
	}

	public function checkBranchCode()
	{
		$branch_code = $this->db->query('SELECT MAX(branch_code) as br_code FROM branch')->row();
		return $branch_code->br_code;
	}

	public function saveBranch($data)
	{
		return $this->db->insert('branch', $data);
	}

	public function delBranch($branch_id)
	{
		return $this->db->delete('branch', ['branch_id' => $branch_id]);
	}

	public function getDept($dept_id = '')
	{
		if ($dept_id) {
			return $this->db->get_where('department', ['dept_id' => $dept_id])->row_array();
		} else {
			return $this->db->get('department')->result();
		}
	}

	public function checkDeptCode()
	{
		$dept_code = $this->db->query('SELECT MAX(dept_code) as dep_code FROM department')->row();
		return $dept_code->dep_code;
	}
	
	public function saveDept($data)
	{
		return $this->db->insert('department', $data);
	}

	public function delDept($dept_id)
	{
		return $this->db->delete('department', ['dept_id' => $dept_id]);
	}

}

/* End of file M_company.php */
