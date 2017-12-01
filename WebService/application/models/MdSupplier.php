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

		function InsertSupplier($Data,$Table)
		{
			# code...
			if($this->db->insert($Table,$Data)){
				return true;
			}else {
				# code...
				return false;
			}

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
		function GetById($Where){
			return $this->db->get_where("Supplier",$Where);
		}
		function UpdateSupplier($Where,$Data,$Table)
		{
			# code...
			$this->db->where($Where);
			if($this->db->update($Table,$Data)){
				return true;
			}else {
				# code...
				return false;
			}
		}
	}
?>
