<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Pajak extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelPajak');
	}

	function GetPajakAll_get()
	{
		# code...
		$data=$this->ModelPajak->GetPajak()->result();
		$this->response($data, 200);
	}
	function GetPajakAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelPajak->GetPajakWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataPajak_post()
	{
		# code...
		$Pajak= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Pajak->IdPajak == null){
			$Pajak->TanggalDiBuat = $Date;
			$Pajak->TanggalDiUbah = $Date;
			if($this->ModelPajak->InsertPajak($Pajak,'Pajak')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Pajak->TanggalDiUbah = $Date;
			$Where=array(
				'IdPajak'=>$Pajak->IdPajak
			);
			if($this->ModelPajak->UpdatePajak($Where,$Pajak,'Pajak')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataPajakById_get($Id)
	{
		# code...
		$where=array('IdPajak'=>$Id);
		$Pajak=$this->ModelPajak->GatById($where,'Pajak')->result();
		$this->response($Pajak[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Pajak'=>$nama);
		$Pajak=$this->ModelPajak->GetLike($where)->result();
		$this->response($Pajak[0], 200);
	}
}
?>
