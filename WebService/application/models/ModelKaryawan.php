<?php
/**
*
*/
class ModelKaryawan extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
	}
	function GetKaryawan()
	{
		# code...
		$this->db->select('*');
		$this->db->from('Karyawan');
		$this->db->join('GroupUser', 'Karyawan.IdGroup = GroupUser.IdGroup');
	  return $this->db->get();
	}
	function GetKaryawanWithFilter($Filter)
	{
		# code...
		$this->db->select('IdKaryawan,
											Karyawan.IdGroup,
											NamaLengkap,
											UserName,
											Password
											TanggalLahir,
											JenisKelamin,
											NoTelepon,
											NoTeleponDarurat,
											Alamat,
											IsApoteker,
											NoRegistrasiApoteker,
											Karyawan.DiBuatOleh,
											Karyawan.DiUbahOleh,
											Karyawan.TanggalDiBuat,
											Karyawan.TanggalDiUbah,
											GroupUser.NamaGroup');
		$this->db->from('Karyawan');
		$this->db->join('GroupUser', 'Karyawan.IdGroup = GroupUser.IdGroup');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
	  return $this->db->get();
	}

	function InsertKaryawan($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			return true;
		}else{
			return false;
		}
	}

	function DeleteKaryawan($Where,$Table)
	{
		# code...
		$this->db->where($Where);
		$this->db->delete($Table);
	}

	function EditKaryawan($Where,$Table)
	{
		# code...
		return $this->db->get_where($Table,$Where);
	}

	function UpdateKaryawan($Where,$Data,$Table)
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
		return $this->db->get_where('Karyawan',$Where);
	}
	function GetLike($param){
		$this->db->select('*');
		$this->db->from('Karyawan');
	    $this->db->like($param);
	return $this->db->get();
	}
}
?>
