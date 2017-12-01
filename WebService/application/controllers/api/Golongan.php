<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Golongan extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelGolongan');
	}

	function GetGolonganAll_get()
	{
		# code...
		$data=$this->ModelGolongan->GetGolongan()->result();
		$this->response($data, 200);
	}

	function SaveDataGolongan_post()
	{
		# code...
		$Golongan= (object) $this->post('body');
		if($Golongan->IdGolongan == null){
			if($this->ModelGolongan->InsertGolongan($Golongan,'Golongan')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Where=array(
				'IdGolongan'=>$Golongan->IdGolongan
			);
			if($this->ModelGolongan->UpdateGolongan($Where,$Golongan,'Golongan')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataGolonganById_get($Id)
	{
		# code...
		$where=array('IdGolongan'=>$Id);
		$Golongan=$this->ModelGolongan->GatById($where,'Golongan')->result();
		$this->response($Golongan[0], 200);
	}
}
?>
