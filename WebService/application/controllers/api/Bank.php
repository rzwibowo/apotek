<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Bank extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelBank');
	}

	function GetBankAll_get()
	{
		# code...
		$data=$this->ModelBank->GetBank()->result();
		$this->response($data, 200);
	}
	function GetBankAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelBank->GetBankWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataBank_post()
	{
		# code...
		$Bank= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Bank->IdBank == null){
			$Bank->TanggalDiBuat = $Date;
			$Bank->TanggalDiUbah = $Date;
			if($this->ModelBank->InsertBank($Bank,'Bank')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Bank->TanggalDiUbah = $Date;
			$Where=array(
				'IdBank'=>$Bank->IdBank
			);
			if($this->ModelBank->UpdateBank($Where,$Bank,'Bank')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataBankById_get($Id)
	{
		# code...
		$where=array('IdBank'=>$Id);
		$Bank=$this->ModelBank->GatById($where,'Bank')->result();
		$this->response($Bank[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Bank'=>$nama);
		$Bank=$this->ModelBank->GetLike($where)->result();
		$this->response($Bank[0], 200);
	}
}
?>
