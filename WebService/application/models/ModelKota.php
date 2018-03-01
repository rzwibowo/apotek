<?php
/**
*
*/
class ModelKota extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetKota()
	{
		# code...
		return $this->db->get('Kota');
	}
	function GetKotaWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Kota');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertKota($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteKota($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditKota($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateKota($Where,$Data,$Table)
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
		return $this->db->get_where('Kota',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Kota');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
