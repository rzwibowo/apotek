<?php
	/**
	*
	*/
	class MdPembelian extends CI_Model
	{

		public function __construct() {
			 parent::__construct();

			 //load database library
			 $this->load->database();
	 }
	 
		function GetPembelian()
		{
            # code...
            $this->db->select('*');
            $this->db->from('pembelian');
			return $this->db->get();
		}

		function InsertPembelian($data,$table)
		{
			# code...
			$this->db->insert($table,$data);
		}

		function DeletePembelian($where,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->delete($table);
		}

		function EditPembelian($where,$table)
		{
			# code...
			return $this->db->get_where($table,$where);
		}
		function GetPembelianByID($where){
			return $this->db->get_where("pembelian",$where);
		}
		function UpdatePembelian($where,$data,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>
