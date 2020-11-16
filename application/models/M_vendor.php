<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_vendor extends CI_Model {
	
	public function getVendor($id = '')
	{
		if ($id) {
			return $this->db->get_where('vendors', ['id' => $id])->row_array();
		} else {
			return $this->db->get('vendors')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('vendors', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('vendors', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('vendors', ['id' => $id]);
	}

}

/* End of file ModelName.php */
