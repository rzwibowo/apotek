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
		$this->load->model('ModelKategori');
	}

	function GetObat($Angka,$Batas,$Filter)
	{
		# code...
		$this->db->select('*');
		$this->db->from('Obat');
		$this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
		$this->db->join('Satuan', 'Satuan.IdSatuan = Obat.IdSatuan');
		if(count($Filter) > 0){
			$this->db->like($Filter);
		}
		$this->db->limit($Angka,$Batas);
	return $this->db->get();
}
function GetObatAll()
{
	# code...
	$this->db->select('*');
	$this->db->from('Obat');
	$this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
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
	                   Obat.IdKategori,
										 NamaObat,
										 StokObat,
										 HargaSatuan,
										 TanggalKadaluarsa,
										 KodeObat,
									   Obat.DiBuatOlah,
										 Obat.DiUbahOleh,
										 Obat.TanggalDiBuat,
										 Obat.TanggalDiUbah,
										 StokMinimal,
										 StokMaximal,
										 Obat.IdSatuan,
										 Obat.keterangan'
									 );
	$this->db->from('Obat');
	$this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
	$this->db->where($Where);
	return $this->db->get();
}else {
	$this->db->select('*');
	$this->db->from('Obat');
	$this->db->join('Kategori', 'Kategori.IdKategori = Obat.IdKategori');
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

function GenerateKodeObat($IdKategori){

	//Create Kode Obat
	$KodeObat ="";
	$IdObatLast = $this->LastRecord()->result();
	if($IdObatLast == null){
			$IdObat = 0 + 1;
	}else{
			$IdObat = $IdObatLast[0]->IdObat + 1;
	}
	$KodeKategori = $this->ModelKategori->GatById(array('IdKategori'=>$IdKategori),'Kategori')->result();
	$KodeKategori = $KodeKategori[0]->KodeKategori;

	if($IdObat < 10){
		$KodeObat = $KodeKategori."0000".$IdObat;
	}else if($IdObat > 9 && $IdObat < 100){
		$KodeObat = $KodeKategori."000".$IdObat;
	}else if ($IdObat > 199 && $IdObat < 1000) {
		$KodeObat = $KodeKategori."00".$IdObat;
	}else if ($IdObat > 1999 && $IdObat < 10000) {
		$KodeObat = $KodeKategori."0".$IdObat;
	}else{
		$KodeObat = $KodeKategori."".$IdObat;
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
