<?php
/**
*
*/
class ModelPembelian extends CI_Model
{
	//Model
	public $PembelianModel = array(
		"IdPembelian" =>null,
		"TanggalPembelian" =>null,
		"IdSupplier" =>null,
		"TotalHargaBeli" =>null,
		"TotalJumlahObat" =>null,
		"StatusPembelian"=>null,
	);
	public $PembelianDetailModel = array(
		"IdDetailPembelian"=>null,
		"IdPembelian"=>null,
		"IdObat"=>null,
		"JumlahObat"=>null,
		"HargaPembelian"=>null,
		"Status"=>null
	);
	public $PembelianByIdModel = array(
		"IdPembelian" =>null,
		"TanggalPembelian" =>null,
		"IdSupplier" =>null,
		"TotalHargaBeli" =>null,
		"TotalJumlahObat" =>null,
		"StatusPembelian"=>null,
		"DetailPembelian"=>null,
	);
	public $PembelianModelObject;
	public $PembelianByIdModalObject;
	public $PembelianByIdModelObject;
	//end
	public function __construct() {
		parent::__construct();
		//load database library
		$this->load->database();
		$this->ConvertModelToObject();
	}

	function ConvertModelToObject(){

		$this->PembelianModelObject = json_decode(json_encode($this->PembelianModel));
		$this->PembelianByIdModalObject = json_decode(json_encode($this->PembelianByIdModel));
		$this->PembelianByIdModelObject = json_decode(json_encode($this->PembelianDetailModel));
	}
	function GetDataPembelian()
	{
		# code...
		$this->db->select('*');
		$this->db->from('Pembelian');
		$this->db->join('Supplier', 'Supplier.IdSupplier = Pembelian.IdSupplier');
		return $this->db->get();
	}

	function InsertPembelian($Data,$Table)
	{
		# code...
		if($this->db->insert($Table,$Data)){
			$this->PembelianModelObject->IdPembelian = $this->db->insert_id();
			return true;
		}else{
			return false;
		}
	}
	function InsertDetail($Table,$Data){
		if(count($Data) > 1){
			if($this->db->insert_batch($Table,$Data)){
				return true;
			}else {
				return false;
			}
		}else {
			if($this->db->insert($Table,$Data)){
				var_dump($Data);
				return true;
			}else{
				return false;
			}
		}
	}

	function DeletePembelian($where,$table)
	{
		# code...
		$this->db->where($where);
		$this->db->delete($table);
	}

	function EditPembelian($where,$table)
	{
		# code...
		return $this->db->get_where($table,$where);
	}
	function GetPembelianById($IdPembelian){
		$this->db->select('*');
		$this->db->from('Pembelian');
		$this->db->where('IdPembelian', $IdPembelian);
		$Pembelian = $this->db->get()->result()[0];
		$this->db->select('*');
		$this->db->from('PembelianDetail');
		$this->db->where('IdPembelian', $IdPembelian);
		$DetailPembelian = $this->db->get()->result();
		$this->PembelianByIdModalObject->IdPembelian = $Pembelian->IdPembelian;
		$this->PembelianByIdModalObject->TanggalPembelian = $Pembelian->TanggalPembelian;
		$this->PembelianByIdModalObject->IdSupplier =$Pembelian->IdSupplier;
		$this->PembelianByIdModalObject->TotalHargaBeli =$Pembelian->TotalHargaBeli;
		$this->PembelianByIdModalObject->TotalJumlahObat =$Pembelian->TotalJumlahObat;
		$this->PembelianByIdModalObject->StatusPembelian=$Pembelian->StatusPembelian;
		$this->PembelianByIdModalObject->DetailPembelian=$DetailPembelian;
		return $this->PembelianByIdModalObject;

	}
	function UpdatePembelian($Data)
	{
		$this->PembelianModelObject->IdSupplier = $Data->IdSupplier;
		$this->PembelianModelObject->TanggalPembelian = $Data->TanggalPembelian;
		$this->PembelianModelObject->TotalJumlahObat = $Data->TotalJumlahObat;
		$this->PembelianModelObject->TotalHargaBeli = $Data->TotalHargaBeli;
		$this->PembelianModelObject->StatusPembelian =$Data->StatusPembelian;
		$Where=array(
			'IdPembelian'=>$Data->IdPembelian
		);
		# code...
		$this->db->where($Where);
		if($this->db->update('Pembelian',$Data)){
      if($this->UpdateDetailPembelian($Data->DetailPembelian,$Data->IdPembelian)){
				return true;
			}else {
				return false;
			}
		}else{
			return false;
		}
	}
	function UpdateDetailPembelian($Detail,$IdPembelian){
		foreach ($Detail as $key => $item) {
			$where= array('IdPembelian'=> $IdPembelian);
			unset($item->IsEdit);
			$this->db->where($Where);
			$this->UpdateDetailPembelian('pembeliandetail',$item);
			//$Detail[$key]= $item;
		 }
		 return true;
		// var_dump($Detail);
		 // if($this->db->update_batch('pembeliandetail', $Detail, 'IdDetailPembelian')){
			//  return true;
		 // }else{
			//  return false;
		 // }
	}
}
?>
