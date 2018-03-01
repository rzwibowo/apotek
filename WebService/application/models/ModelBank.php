<?php
/**
*
*/
class ModelBank extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetBank()
	{
		# code...
		return $this->db->get('Bank');
	}
	function GetBankWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Bank');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertBank($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteBank($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditBank($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateBank($Where,$Data,$Table)
	{
		# code...
		$this->db->where($Where);
		if($this->db->update($Table,$Data)){
			return true;
		}else {
			return false;
		}
	}
	function GatById($Where,$Table)
	{
		# code...
		return $this->db->get_where('Bank',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Bank');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
