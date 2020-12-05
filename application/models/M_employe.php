<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_employe extends CI_Model {

	public function getEmploye($id = '')
	{
		$this->db->select('*, b.name as dept, c.name as branch')
				->from('employees a')
				->join('department b', 'b.dept_id = a.dept', 'inner')
				->join('branch c', 'c.branch_id = a.branch', 'inner');
		$data = $this->db->get();
		if ($id) {
			return $data->where(['a.employe_id' => $id])->row_array();
		} else {
			return $data->result();
		}
	}

	public function checkEmployeId()
	{
		$employe_id = $this->db->query('SELECT MAX(employe_id) as employe_code FROM employees')->row();
		return $employe_id->employe_code;
	}

	public function save($data)
	{
		return $this->db->insert('employees', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('employees', $data, ['employe_id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('employees', ['employe_id' => $id]);
	}

}

/* End of file M_employe.php */
