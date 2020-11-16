<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {
	
	public function getProduct($id = '')
	{
		if ($id) {
			return $this->db->get_where('products', ['id' => $id])->row_array();
		} else {
			return $this->db->get('products')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('products', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('products', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('products', ['id' => $id]);
	}

}

/* End of file ModelName.php */
