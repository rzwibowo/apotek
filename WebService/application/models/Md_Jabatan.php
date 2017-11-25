<?php
	/**
	*
	*/
	class Md_Jabatan extends CI_Model
	{

		public function __construct() {
			 parent::__construct();

			 //load database library
			 $this->load->database();
	 }
		function get_jabatan()
		{
            # code...
            $this->db->select('*');
            $this->db->from('jabatan');
			return $this->db->get();
		}

		function insert_jabatan($data,$table)
		{
			# code...
			$this->db->insert($table,$data);
		}

		function delete_jabatan($where,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->delete($table);
		}

		function edit_jabatan($where,$table)
		{
			# code...
			return $this->db->get_where($table,$where);
		}

		function update_jabatan($where,$data,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>
