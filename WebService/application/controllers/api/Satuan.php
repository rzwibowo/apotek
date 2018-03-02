<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Satuan extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelSatuan');
	}

	function GetSatuanAll_get()
	{
		# code...
		$data=$this->ModelSatuan->GetSatuan()->result();
		$this->response($data, 200);
	}
	function GetSatuanAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelSatuan->GetSatuanWithFilter($Filter)->result();
		$this->response($data, 200);
	}

	function SaveDataSatuan_post()
	{
		# code...
		$Satuan= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Satuan->IdSatuan == null){
			$Satuan->TanggalDiBuat = $Date;
			$Satuan->TanggalDiUbah = $Date;
			if($this->ModelSatuan->InsertSatuan($Satuan,'Satuan')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Satuan->TanggalDiUbah = $Date;
			$Where=array(
				'IdSatuan'=>$Satuan->IdSatuan
			);
			if($this->ModelSatuan->UpdateSatuan($Where,$Satuan,'Satuan')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataSatuanById_get($Id)
	{
		# code...
		$where=array('IdSatuan'=>$Id);
		$Satuan=$this->ModelSatuan->GatById($where,'Satuan')->result();
		$this->response($Satuan[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Satuan'=>$nama);
		$Satuan=$this->ModelSatuan->GetLike($where)->result();
		$this->response($Satuan[0], 200);
	}
}
?>
