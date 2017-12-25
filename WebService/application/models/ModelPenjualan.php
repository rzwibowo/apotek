<?php
/**
*
*/
class ModelPenjualan extends CI_Model
{
  //Model
  public $PenjualanModel = array(
    "IdPenjualan" => null,
    "TanggalJual"=>null,
    "IdPegawai" => null,
    "TotalHargaJual" => null,
    "TotalJumlahObat"=>null
  );
  public $PenjualanDetailModel = array(
    "IdDetailJual" => null,
    "IdPenjualan"=> null,
    "IdObat"=>null,
    "JumlahObat"=>null,
    "HargaSatuan"=>null
  );
  public $PenjualanModelObject;
  public $PenjualanByIdModalObject;
  //end
  public function __construct() {
    parent::__construct();
    //load database library
    $this->load->database();
    $this->ConvertModelToObject();
  }

  function ConvertModelToObject(){

    $this->PenjualanModelObject = json_decode(json_encode($this->PenjualanModel));
  }
  function GetDataPenjualan()
  {
    # code...
    $this->db->select('*');
    $this->db->from('Penjualan');
    $this->db->join('Supplier', 'Supplier.IdSupplier = Penjualan.IdSupplier');
    return $this->db->get();
  }

  function InsertPenjualan($Data,$Table)
  {
    # code...
    if($this->db->insert($Table,$Data)){
      $this->PenjualanModelObject->IdPenjualan = $this->db->insert_id();
      return true;
    }else{
      return false;
    }
  }
  function InsertDetail($Table,$Data){
    foreach ($Data as $key => $value) {
      $Data[$key]->IdPenjualan = $this->PenjualanModelObject->IdPenjualan;
    }
    if($this->db->insert_batch($Table,$Data)){
      return true;
    }else {
      return false;
    }
  }

  function DeletePenjualan($where,$table)
  {
    # code...
    $this->db->where($where);
    $this->db->delete($table);
  }

  function EditPenjualan($where,$table)
  {
    # code...
    return $this->db->get_where($table,$where);
  }
  function GetPenjualanById($IdPenjualan,$Edit){
    if($Edit == 'true'){
      $this->db->select('*');
      $this->db->from('Penjualan');
      $this->db->where('IdPenjualan', $IdPenjualan);
      $Penjualan = $this->db->get()->result()[0];
      $this->db->select('*');
      $this->db->from('PenjualanDetail');
      $this->db->where('IdPenjualan', $IdPenjualan);
      $DetailPenjualan = $this->db->get()->result();
      $this->PenjualanByIdModalObject->IdPenjualan = $Penjualan->IdPenjualan;
      $this->PenjualanByIdModalObject->TanggalPenjualan = $Penjualan->TanggalPenjualan;
      $this->PenjualanByIdModalObject->IdSupplier =$Penjualan->IdSupplier;
      $this->PenjualanByIdModalObject->TotalHargaBeli =$Penjualan->TotalHargaBeli;
      $this->PenjualanByIdModalObject->TotalJumlahObat =$Penjualan->TotalJumlahObat;
      $this->PenjualanByIdModalObject->StatusPenjualan=$Penjualan->StatusPenjualan;
      $this->PenjualanByIdModalObject->DetailPenjualan=$DetailPenjualan;
      return $this->PenjualanByIdModalObject;
    }else{
      $this->db->select('*');
      $this->db->from('Penjualan');
      $this->db->join('Supplier', 'Supplier.IdSupplier = Penjualan.IdSupplier');
      $this->db->where('IdPenjualan', $IdPenjualan);
      $Penjualan = $this->db->get()->result()[0];
      $this->db->select('*');
      $this->db->from('PenjualanDetail');
      $this->db->join('Obat', 'Obat.IdObat = Penjualandetail.IdObat');
      $this->db->where('IdPenjualan', $IdPenjualan);
      $DetailPenjualan = $this->db->get()->result();
      $this->PenjualanByIdModalObject->IdPenjualan = $Penjualan->IdPenjualan;
      $this->PenjualanByIdModalObject->TanggalPenjualan = $Penjualan->TanggalPenjualan;
      $this->PenjualanByIdModalObject->IdSupplier =$Penjualan->IdSupplier;
      $this->PenjualanByIdModalObject->TotalHargaBeli =$Penjualan->TotalHargaBeli;
      $this->PenjualanByIdModalObject->TotalJumlahObat =$Penjualan->TotalJumlahObat;
      $this->PenjualanByIdModalObject->StatusPenjualan=$Penjualan->StatusPenjualan;
      $this->PenjualanByIdModalObject->DetailPenjualan=$DetailPenjualan;
      return $this->PenjualanByIdModalObject;
    }

  }
  function UpdatePenjualan($Data)
  {
    $this->PenjualanModelObject->IdSupplier = $Data->IdSupplier;
    $this->PenjualanModelObject->TanggalPenjualan = $Data->TanggalPenjualan;
    $this->PenjualanModelObject->TotalJumlahObat = $Data->TotalJumlahObat;
    $this->PenjualanModelObject->TotalHargaBeli = $Data->TotalHargaBeli;
    $this->PenjualanModelObject->StatusPenjualan =$Data->StatusPenjualan;
    $Where=array(
      'IdPenjualan'=>$Data->IdPenjualan
    );
    # code...
    $this->db->where($Where);
    if($this->db->update('Penjualan',$Data)){
      if($this->UpdateDetailPenjualan($Data->DetailPenjualan,$Data->IdPenjualan)){
        return true;
      }else {
        return false;
      }
    }else{
      return false;
    }
  }
  function UpdateDetailPenjualan($Detail,$IdPenjualan){
    $NewData =array();
    $DataUpdate =array();
    $DataDelete = array();

    $this->db->select('*');
    $this->db->from('PenjualanDetail');
    $this->db->where('IdPenjualan', $IdPenjualan);
    $DetailDB = $this->db->get()->result();

    $NewData = $this->SearchArray(NULL,'IdDetailPenjualan',$Detail);
    foreach ($DetailDB as $key => $item) {
      $Rsult = $this->SearchArray($item->IdDetailPenjualan,'IdDetailPenjualan',$Detail);
      if(count($Rsult) == 0){
        $DataDelete[] =  $item;
      }else {
        $st = $this->SearchArray($item->IdDetailPenjualan,'IdDetailPenjualan',$Detail)[0];
        $DataUpdate[] = $st;
      }
    }
    if(count($DataUpdate) > 0){
      $this->db->trans_start();
      $this->db->update_batch('Penjualandetail', $DataUpdate, 'IdDetailPenjualan');
      $this->db->trans_complete();
      if($this->db->trans_status()){
        if(count($DataDelete) > 0){
          $ListIddelete =  array_column($DataDelete, 'IdDetailPenjualan');
          $this->db->where_in('IdDetailPenjualan', $ListIddelete);
          if($this->db->delete('Penjualandetail')){
            if(count($NewData) > 0){
              if($this->db->insert_batch('PenjualanDetail',$NewData)){
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
            if($this->db->insert_batch('PenjualanDetail',$NewData)){
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
        $ListIddelete =  array_column($DataDelete, 'IdDetailPenjualan');
        $this->db->where_in('IdDetailPenjualan', $ListIddelete);
        if($this->db->delete('Penjualandetail')){
          if(count($NewData) > 0){
            if($this->db->insert_batch('PenjualanDetail',$NewData)){
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
