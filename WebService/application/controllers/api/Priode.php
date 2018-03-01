<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Priode extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelPriode');
		//$this->load->model('obat');
	}

	function GetDataPriode_get()
	{
		# code...
		$Priode=$this->ModelPriode->GetPriode()->result();
		$this->response($Priode, 200);
	}
	function GetDataPriode_post()
	{
		# code...
		$Filter = $this->post('body');
		$Priode=$this->ModelPriode->GetPriodeWithFilter($Filter)->result();
		$this->response($Priode, 200);
	}


	function SaveDataPriode_post()
	{
		// 		# code...
		$Priode = (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Priode->IdPriode == null){
			$Priode->TanggalDiBuat = $Date;
			$Priode->TanggalDiUbah = $Date;
			if($this->ModelPriode->InsertPriode($Priode,'Priode')){
				$this->response(array('status' => 'sukses'), 200);
			}else {
				$this->response(array('error' => 'Gagal Simpan Data'), 404);
			}
		}
		else{
			$Priode->TanggalDiUbah = $Date;
			$Where=array(
				'IdPriode'=>$Priode->IdPriode
			);
			if($this->ModelPriode->UpdatePriode($Where,$Priode,'Priode')){
				$this->response(array('status' => 'sukses'), 200);
			}else {
				$this->response(array('error' => 'Gagal Simpan Data'), 404);
			}
		}
	}
		function GatDataPriodeById_get($Id)
		{
			# code...
			$Where=array('IdPriode'=>$Id);
			$Priode=$this->ModelPriode->GetById($Where)->result();
			$this->response($Priode[0], 200);
		}
}
?>
