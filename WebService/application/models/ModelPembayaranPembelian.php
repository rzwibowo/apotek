<?php
/**
*
*/
class ModelPembayaranPembelian extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetPembayaranPembelian()
	{
		# code...
		return $this->db->get('PembayaranPembelian');
	}
	function GetPembayaranPembelianWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('PembayaranPembelian');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertPembayaranPembelian($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeletePembayaranPembelian($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditPembayaranPembelian($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdatePembayaranPembelian($Where,$Data,$Table)
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
		return $this->db->get_where('PembayaranPembelian',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('PembayaranPembelian');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
