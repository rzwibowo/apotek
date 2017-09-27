<?php
	/**
	* 
	*/
	class Md_Obat extends CI_Model
	{
		
		function get_obat()
		{
            # code...
            $this->db->select('*');
            $this->db->from('obat');
            $this->db->join('obat_gol', 'obat_gol.kd_gol = obat.gol_obat');
			return $this->db->get();
		}

		function insert_obat($data,$table)
		{
			# code...
			$this->db->insert($table,$data);
		}

		function delete_obat($where,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->delete($table);
		}

		function edit_obat($where,$table)
		{
			# code...
			return $this->db->get_where($table,$where);
		}

		function update_obat($where,$data,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>