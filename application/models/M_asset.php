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
