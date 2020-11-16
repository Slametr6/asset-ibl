<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_return extends CI_Model {

	public function getReturn($id = '')
	{
		if ($id) {
			return $this->db->get_where('form_return', ['id' => $id])->row_array();
		} else {
			return $this->db->get('form_return')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('form_return', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('form_return', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('form_return', ['id' => $id]);
	}

}

/* End of file ModelName.php */
