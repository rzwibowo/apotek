<?php
/**
*
*/
class ModelPajak extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetPajak()
	{
		# code...
		return $this->db->get('Pajak');
	}
	function GetPajakWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Pajak');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertPajak($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeletePajak($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditPajak($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdatePajak($Where,$Data,$Table)
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
		return $this->db->get_where('Pajak',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Pajak');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
