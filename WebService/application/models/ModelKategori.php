<?php
/**
*
*/
class ModelKategori extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetKategori()
	{
		# code...
		return $this->db->get('Kategori');
	}
	function GetKategoriWithFilter($Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Kategori');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertKategori($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteKategori($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditKategori($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateKategori($Where,$Data,$Table)
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
		return $this->db->get_where('Kategori',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Kategori');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
