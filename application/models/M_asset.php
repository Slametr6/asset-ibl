<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_asset extends CI_Model {

	public function getAsset($id = '')
	{
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

	// public function getAssetbyNoEq($noEq)
	// {
	// 	$query = $this->db->get_where('assets', ['no_eq' => $noEq]);
	// 	if($query->num_rows() >0) {
	// 		foreach ($query->result() as $data) {
	// 			$result = [
	// 				'category' => $data->category,
	// 				'no_eq' => $data->no_eq,
	// 				'no_asset' => $data->no_asset,
	// 				'sn' => $data->sn,
	// 				'descript' => $data->descript,
	// 				'location' => $data->location,
	// 				'conditions' => $data->conditions,
	// 				'status' => $data->status
	// 			];
	// 			// echo json_encode($data);
	// 		}
	// 		return $result;
	// 	}
	// }

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
		$this->db->select('b.category as category, b.no_eq as no_eq, b.no_asset as no_asset, b.sn as sn, b.descript as descript, c.nik as nik, c.emp_name as emp_name, c.gender as gender, c.dept as dept, c.branch as branch, b.location as location, a.qty, a.unit_id, b.conditions as conditios, b.status as status')
				->from('user_asset a')
				->join('assets b', 'b.no_eq = a.no_eq', 'inner')
				->join('employees c', 'c.nik = a.nik', 'inner');
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
