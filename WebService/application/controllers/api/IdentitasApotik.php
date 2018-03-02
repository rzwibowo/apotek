<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class IdentitasApotik extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelIdentitasApotik');
	}

	function GetApotikAll_get()
	{
		# code...
		$data=$this->ModelIdentitasApotik->GetApotik()->result();
		$this->response($data, 200);
	}
	function GetApotikAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelIdentitasApotik->GetApotikWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataApotik_post()
	{
		# code...
		$Apotik= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Apotik->IdApotik == null){
			$Apotik->TanggalDiBuat = $Date;
			$Apotik->TanggalDiUbah = $Date;
			if($this->ModelIdentitasApotik->InsertApotik($Apotik,'Apotik')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Apotik->TanggalDiUbah = $Date;
			$Where=array(
				'IdApotik'=>$Apotik->IdApotik
			);
			if($this->ModelIdentitasApotik->UpdateApotik($Where,$Apotik,'Apotik')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataApotikById_get($Id)
	{
		# code...
		$where=array('IdApotik'=>$Id);
		$Apotik=$this->ModelIdentitasApotik->GatById($where,'Apotik')->result();
		$this->response($Apotik[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Apotik'=>$nama);
		$Apotik=$this->ModelIdentitasApotik->GetLike($where)->result();
		$this->response($Apotik[0], 200);
	}
}
?>
