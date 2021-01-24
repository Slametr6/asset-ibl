<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_asset extends CI_Model {

	public function getAsset($id = '')
	{
		$id = $this->input->post('asset_id');
		$this->db->select('*, b.cat_name as category, c.description as location')
				->from('assets a')
				->join('category b', 'b.cat_id = a.category', 'inner')
				->join('location c', 'c.location_id = a.location', 'inner');
		$data = $this->db->get();
		if ($id) {
			return $data->row_array();

		} else {
			return $data->result();

		}
	}

	public function getAssetbyStatus()
	{
		$this->db->select('*, b.cat_name as category, c.description as location')
				->from('assets a')
				->join('category b', 'b.cat_id = a.category', 'inner')
				->join('location c', 'c.location_id = a.location', 'inner')
				->where('status', 'not_use');
		$data = $this->db->get();
		return $data->result();

	}
	
	public function checkNoEq()
	{
		$no_eq = $this->db->query('SELECT MAX(no_eq) as eq_code FROM assets')->row();
		return $no_eq->eq_code;
	}

	public function save($data)
	{
		return $this->db->insert('assets', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('assets', $data, ['asset_id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('assets', ['asset_id' => $id]);
	}

	public function getUserAsset($id = '')
	{
		$this->db->select('*, d.cat_name as category, b.no_eq, b.no_asset, b.sn, b.descript, c.nik, c.emp_name, c.gender, g.name as dept_id, f.name as branch_id, e.description as location, a.qty, h.unit as unitId ')
				->from('user_asset a')
				->join('assets b', 'b.no_eq = a.no_eq', 'inner')
				->join('employees c', 'c.nik = a.nik', 'inner')
				->join('category d', 'd.cat_id = b.category', 'inner')
				->join('location e', 'e.location_id = b.location', 'inner')
				->join('branch f', 'f.branch_code = c.branch_id', 'inner')
				->join('department g', 'g.dept_code = c.dept_id', 'inner')
				->join('unit h', 'h.unit_id = a.unitId', 'inner');
		$data = $this->db->get();
		if ($id) {
			return $data->row_array();
		} else {
			return $data->result();
		}
	}

	public function saveUserAsset($data)
	{

		return $this->db->insert('user_asset', $data);

	}

	public function updateUserAsset($data, $id)
	{
		return $this->db->update('user_asset', $data, ['userasset_id' => $id]);
	}

	public function deleteUserAsset($id)
	{
		return $this->db->delete('user_asset', ['userasset_id' => $id]);
	}

	public function getCat($id = '')
	{
		if ($id) {
			return $this->db->get_where('category', ['id' => $id])->row_array();
		} else {
			return $this->db->get('category')->result();
		}
	}

	public function checkCatId()
	{
		$cat_id = $this->db->query('SELECT MAX(cat_id) as cat_code FROM category')->row();
		return $cat_id->cat_code;
	}

	public function saveCat($data)
	{
		return $this->db->insert('category', $data);
	}

	public function delCat($id)
	{
		return $this->db->delete('category', ['cat_id' => $id]);
	}

	public function getLocation($id = '')
	{
		if ($id) {
			return $this->db->get_where('location', ['location_id' => $id])->row_array();
		} else {
			return $this->db->get('location')->result();
		}
	}

	public function checkLocationId()
	{
		$location_id = $this->db->query('SELECT MAX(location_id) as location_code FROM location')->row();
		return $location_id->location_code;
	}

	public function saveLocation($data)
	{
		return $this->db->insert('location', $data);
	}

	public function delLocation($id)
	{
		return $this->db->delete('location', ['location_id' => $id]);
	}

	public function getUnit($id = '')
	{
		if ($id) {
			return $this->db->get_where('unit', ['unit_id' => $id])->row_array();
		} else {
			return $this->db->get('unit')->result();
		}
	}

	public function saveUnit($data)
	{
		return $this->db->insert('unit', $data);
	}

	public function delUnit($id)
	{
		return $this->db->delete('unit', ['unit_id' => $id]);
	}

}

/* End of file ModelName.php */
