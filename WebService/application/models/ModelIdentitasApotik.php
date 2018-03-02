<?php
/**
*
*/
class ModelIdentitasApotik extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetApotik()
	{
		# code...
		return $this->db->get('Apotik');
	}
	function GetApotikWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Apotik');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertApotik($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteApotik($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditApotik($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateApotik($Where,$Data,$Table)
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
		return $this->db->get_where('Apotik',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Apotik');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
