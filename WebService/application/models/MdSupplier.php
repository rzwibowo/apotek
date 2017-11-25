<?php
	/**
	*
	*/
	class MdSupplier extends CI_Model
	{
		public function __construct() {
			 parent::__construct();

			 //load database library
			 $this->load->database();
	 }
		function GetSupplier()
		{
            # code...
            $this->db->select('*');
            $this->db->from('supplier');
			return $this->db->get();
		}

		function InsertSupplier($data,$table)
		{
			# code...
			$this->db->insert($table,$data);
		}

		function DeleteSupplier($where,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->delete($table);
		}

		function EditSupplier($where,$table)
		{
			# code...
			return $this->db->get_where($table,$where);
		}
		function GetSupplierByID($where){
			return $this->db->get_where("supplier",$where);
		}
		function UpdateSupplier($where,$data,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	}
?>
