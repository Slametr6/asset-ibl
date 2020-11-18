<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_asset extends CI_Model {

	public function getAsset($id = '')
	{
		if ($id) {
			return $this->db->get_where('assets', ['id' => $id])->row_array();
		} else {
			return $this->db->get('assets')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('assets', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('assets', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('assets', ['id' => $id]);
	}

}

/* End of file ModelName.php */
