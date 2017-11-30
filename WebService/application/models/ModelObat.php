<?php
/**
*
*/
class ModelObat extends CI_Model
{
	public function __construct() {
		parent::__construct();

		//load database library
		$this->load->database();
		$this->load->model('ModelGolongan');
	}

	function GetObat($Angka,$Batas)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Obat');
		$this->db->join('Golongan', 'Golongan.IdGolongan = Obat.IdGolongan');
		$this->db->limit($Angka,$Batas);
	return $this->db->get();
}

function Data($Angka,$Batas)
{
	# code...
	return $query=$this->db->get('Obat',$Angka,$Batas)->result();
}

function JumlahData()
{
	# code...
	return $this->db->get('Obat')->num_rows();
}

function InsertObat($Data,$Table)
{
	# code...
	if($this->db->insert($Table,$Data)){
		return true;
	}else {
		return false;
	}
}

function DeleteObat($Where,$Table)
{
	# code...
	$this->db->where($Where);
	$this->db->delete($Table);
}

function GetObatById($Where,$Table,$IsEdit)
{
	# code...
	if($IsEdit == 'true'){
	$this->db->select('IdObat,
	                   Obat.IdGolongan,
										 NamaObat,
										 StokObat,
										 HargaSatuan,
										 TanggalKadaluarsa,
										 KodeObat');
	$this->db->from('Obat');
	$this->db->join('Golongan', 'Golongan.IdGolongan = Obat.IdGolongan');
	$this->db->where($Where);
	return $this->db->get();
}else {
	$this->db->select('*');
	$this->db->from('Obat');
	$this->db->join('Golongan', 'Golongan.IdGolongan = Obat.IdGolongan');
	$this->db->where($Where);
	return $this->db->get();
}


}

function UpdateObat($Where,$Data,$Table)
{
	# code...
	$this->db->where($Where);
	if($this->db->update($Table,$Data)){
		return true;
	}else{
		return false;
	}
}

function GenerateKodeObat($IdGolongan){

	//Create Kode Obat
	$KodeObat ="";
	$IdObatLast = $this->LastRecord()->result();
	$IdObat = $IdObatLast[0]->IdObat + 1;
	$KodeGolongan = $this->ModelGolongan->GatById(array('IdGolongan'=>$IdGolongan))->result();
	$KodeGolongan = $KodeGolongan[0]->KodeGolongan;

	if($IdObat < 10){
		$KodeObat = $KodeGolongan."0000".$IdObat;
	}else if($IdObat > 9 && $IdObat < 100){
		$KodeObat = $KodeGolongan."000".$IdObat;
	}else if ($IdObat > 199 && $IdObat < 1000) {
		$KodeObat = $KodeGolongan."00".$IdObat;
	}else if ($IdObat > 1999 && $IdObat < 10000) {
		$KodeObat = $KodeGolongan."0".$IdObat;
	}else{
		$KodeObat = $KodeGolongan."".$IdObat;
	}
	return $KodeObat;
}

function LastRecord(){
	$this->db->select('IdObat');
	$this->db->from('Obat');
	$this->db->order_by("IdObat", "DESC");
	$this->db->limit(1);
	return $this->db->get();
}
}
?>
