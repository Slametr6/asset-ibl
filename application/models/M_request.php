<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_request extends CI_Model {

	public function getRequest($id = '')
	{
		if ($id) {
			return $this->db->get_where('form_request', ['id' => $id])->row_array();
		} else {
			return $this->db->get('form_request')->result();
		}
	}

	public function save($data)
	{
		return $this->db->insert('form_request', $data);
	}

	public function update($data, $id)
	{
		return $this->db->update('form_request', $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('form_request', ['id' => $id]);
	}

}

/* End of file ModelName.php */
