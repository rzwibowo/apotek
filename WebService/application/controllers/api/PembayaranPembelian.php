<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class PembayaranPembelian extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelPembayaranPembelian');
	}

	function GetPembayaranPembelianAll_get()
	{
		# code...
		$data=$this->ModelPembayaranPembelian->GetPembayaranPembelian()->result();
		$this->response($data, 200);
	}
	function GetPembayaranPembelianAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelPembayaranPembelian->GetPembayaranPembelianWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataPembayaranPembelian_post()
	{
		# code...
		$PembayaranPembelian= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($PembayaranPembelian->IdPembayaranPembelian == null){
			$PembayaranPembelian->TanggalDiBuat = $Date;
			$PembayaranPembelian->TanggalDiUbah = $Date;
			if($this->ModelPembayaranPembelian->InsertPembayaranPembelian($PembayaranPembelian,'PembayaranPembelian')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$PembayaranPembelian->TanggalDiUbah = $Date;
			$Where=array(
				'IdPembayaranPembelian'=>$PembayaranPembelian->IdPembayaranPembelian
			);
			if($this->ModelPembayaranPembelian->UpdatePembayaranPembelian($Where,$PembayaranPembelian,'PembayaranPembelian')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataPembayaranPembelianById_get($Id)
	{
		# code...
		$where=array('IdPembayaranPembelian'=>$Id);
		$PembayaranPembelian=$this->ModelPembayaranPembelian->GatById($where,'PembayaranPembelian')->result();
		$this->response($PembayaranPembelian[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('PembayaranPembelian'=>$nama);
		$PembayaranPembelian=$this->ModelPembayaranPembelian->GetLike($where)->result();
		$this->response($PembayaranPembelian[0], 200);
	}
}
?>
