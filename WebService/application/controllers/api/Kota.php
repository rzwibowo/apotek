<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Kota extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelKota');
	}

	function GetKotaAll_get()
	{
		# code...
		$data=$this->ModelKota->GetKota()->result();
		$this->response($data, 200);
	}
	function GetKotaAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelKota->GetKotaWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataKota_post()
	{
		# code...
		$Kota= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Kota->IdKota == null){
			$Kota->TanggalDiBuat = $Date;
			$Kota->TanggalDiUbah = $Date;
			if($this->ModelKota->InsertKota($Kota,'Kota')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Kota->TanggalDiUbah = $Date;
			$Where=array(
				'IdKota'=>$Kota->IdKota
			);
			if($this->ModelKota->UpdateKota($Where,$Kota,'Kota')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataKotaById_get($Id)
	{
		# code...
		$where=array('IdKota'=>$Id);
		$Kota=$this->ModelKota->GatById($where,'Kota')->result();
		$this->response($Kota[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Kota'=>$nama);
		$Kota=$this->ModelKota->GetLike($where)->result();
		$this->response($Kota[0], 200);
	}
}
?>
