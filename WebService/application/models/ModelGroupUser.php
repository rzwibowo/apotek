<?php
/**
*
*/
class ModelGroupUser extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetGroupUser()
	{
		# code...
		return $this->db->get('GroupUser');
	}
	function GetGroupUserWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('GroupUser');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertGroupUser($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteGroupUser($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditGroupUser($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateGroupUser($Where,$Data,$Table)
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
		return $this->db->get_where('GroupUser',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('GroupUser');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
