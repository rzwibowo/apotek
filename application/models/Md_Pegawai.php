<?php
	/**
	*
	*/
	class Md_Pegawai extends CI_Model
	{

		function get_pegawai()
		{
            # code...
            $this->db->select('*');
            $this->db->from('pegawai');
			return $this->db->get();
		}

		function insert_pegawai($data,$table)
		{
			# code...
			$this->db->insert($table,$data);
		}

		function delete_pegawai($where,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->delete($table);
		}

		function edit_pegawai($where,$table)
		{
			# code...
			return $this->db->get_where($table,$where);
		}

		function update_pegawai($where,$data,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>
