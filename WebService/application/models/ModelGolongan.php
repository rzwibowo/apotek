<?php
	/**
	*
	*/
	class ModelGolongan extends CI_Model
	{
		public function __construct() {
			 parent::__construct();

			 //load database library
			 $this->load->database();
	 }
		function GetGolongan()
		{
            # code...
			return $this->db->get('Golongan');
		}

		function InsertGolongan($Data,$Table)
		{
			# code...
			$this->db->insert($Table,$Data);
		}

		function DeleteGolongan($Where,$Table)
		{
			# code...
			$this->db->where($Where);
			$this->db->delete($Table);
		}

		function EditGolongan($Where,$Table)
		{
			# code...
			return $this->db->get_where($Table,$Where);
		}

		function UpdateGolongan($Where,$Data,$Table)
		{
			# code...
			$this->db->where($Where);
			$this->db->update($Table,$Data);
		}
		function GatById($Where)
		{
			# code...
			return $this->db->get_where('Golongan',$Where);
		}
	}
?>
