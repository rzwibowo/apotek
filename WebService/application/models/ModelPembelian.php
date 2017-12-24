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
	function GetPembelianById($IdPembelian,$Edit){
		if($Edit == 'true'){
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
	}else{
		$this->db->select('*');
		$this->db->from('Pembelian');
		$this->db->join('Supplier', 'Supplier.IdSupplier = Pembelian.IdSupplier');
		$this->db->where('IdPembelian', $IdPembelian);
		$Pembelian = $this->db->get()->result()[0];
		$this->db->select('*');
		$this->db->from('PembelianDetail');
	  $this->db->join('Obat', 'Obat.IdObat = pembeliandetail.IdObat');
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
		$NewData =array();
		$DataUpdate =array();
		$DataDelete = array();

		$this->db->select('*');
		$this->db->from('PembelianDetail');
		$this->db->where('IdPembelian', $IdPembelian);
		$DetailDB = $this->db->get()->result();

		$NewData = $this->SearchArray(NULL,'IdDetailPembelian',$Detail);
		foreach ($DetailDB as $key => $item) {
        $Rsult = $this->SearchArray($item->IdDetailPembelian,'IdDetailPembelian',$Detail);
				if(count($Rsult) == 0){
            $DataDelete[] =  $item;
				}else {
					$st = $this->SearchArray($item->IdDetailPembelian,'IdDetailPembelian',$Detail)[0];
			     $DataUpdate[] = $st;
				}
		 }
		 if(count($DataUpdate) > 0){
			 $this->db->trans_start();
			 $this->db->update_batch('pembeliandetail', $DataUpdate, 'IdDetailPembelian');
			 $this->db->trans_complete();
			 if($this->db->trans_status()){
				 if(count($DataDelete) > 0){
					 $ListIddelete =  array_column($DataDelete, 'IdDetailPembelian');
					 $this->db->where_in('IdDetailPembelian', $ListIddelete);
					 if($this->db->delete('pembeliandetail')){
						 if(count($NewData) > 0){
							 if($this->db->insert_batch('PembelianDetail',$NewData)){
								 return true;
							 }else {
								 return false;
							 }
						 }else {
							 return true;
						 }
					 }else {
						 return false;
					 }
				 }else{
					 if(count($NewData) > 0){
						 if($this->db->insert_batch('PembelianDetail',$NewData)){
							 return true;
						 }else {
							 return false;
						 }
					 }else {
						 return true;
					 }
				 }
			 }else {
				 return false;
			 }
		 }else{
			 if(count($DataDelete)){
				 $ListIddelete =  array_column($DataDelete, 'IdDetailPembelian');
				 $this->db->where_in('IdDetailPembelian', $ListIddelete);
				 if($this->db->delete('pembeliandetail')){
					 if(count($NewData) > 0){
						 if($this->db->insert_batch('PembelianDetail',$NewData)){
							 return true;
						 }else {
							 return false;
						 }
					 }else {
						 return true;
					 }
				 }else {
					 return false;
				 }
			 }

		 }
	 }

	function SearchArray($id,$colum, $array) {
	$Result = array();
   foreach ($array as $key => $val) {
       if ($val->$colum === $id) {
					array_push($Result,$val);
       }
   }
   return $Result;
}
}
?>
