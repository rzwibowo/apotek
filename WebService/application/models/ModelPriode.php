<?php
	/**
	*
	*/
	class ModelPriode extends CI_Model
	{
		public function __construct() {
			 parent::__construct();

			 //load database library
			 $this->load->database();
	 }
		function GetPriode()
		{
            # code...
            $this->db->select('*');
            $this->db->from('Priode');
			return $this->db->get();
		}
		function GetPriodeWithFilter($Filter)
		{
						# code...
						$this->db->select('*');
						$this->db->from('Priode');
						if(count($Filter) > 0){
							$this->db->like($Filter);
						}
			 return $this->db->get();
		}

		function InsertPriode($Data,$Table)
		{
			# code...
			if($this->db->insert($Table,$Data)){
				return true;
			}else {
				# code...
				return false;
			}

		}

		function DeletePriode($where,$table)
		{
			# code...
			$this->db->where($where);
			$this->db->delete($table);
		}

		function EditPriode($where,$table)
		{
			# code...
			return $this->db->get_where($table,$where);
		}
		function GetById($Where){
			return $this->db->get_where("Priode",$Where);
		}
		function UpdatePriode($Where,$Data,$Table)
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
