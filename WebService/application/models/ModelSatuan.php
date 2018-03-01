<?php
/**
*
*/
class ModelSatuan extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetSatuan()
	{
		# code...
		return $this->db->get('Satuan');
	}

	function InsertSatuan($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteSatuan($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditSatuan($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateSatuan($Where,$Data,$Table)
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
		return $this->db->get_where('Satuan',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Satuan');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
