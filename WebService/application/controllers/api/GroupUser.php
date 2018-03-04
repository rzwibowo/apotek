<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class GroupUser extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelGroupUser');
	}

	function GetGroupAll_get()
	{
		# code...
		$data=$this->ModelGroupUser->GetGroupUser()->result();
		$this->response($data, 200);
	}
	function GetGroupAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelGroupUser->GetGroupUserWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataGroup_post()
	{
		# code...
		$GroupUser= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($GroupUser->IdGroup == null){
			$GroupUser->TanggalDiBuat = $Date;
			$GroupUser->TanggalDiUbah = $Date;
			if($this->ModelGroupUser->InsertGroupUser($GroupUser,'GroupUser')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$GroupUser->TanggalDiUbah = $Date;
			$Where=array(
				'IdGroup'=>$GroupUser->IdGroup
			);
			if($this->ModelGroupUser->UpdateGroupUser($Where,$GroupUser,'GroupUser')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataGroupById_get($Id)
	{
		# code...
		$where=array('IdGroup'=>$Id);
		$GroupUser=$this->ModelGroupUser->GatById($where,'GroupUser')->result();
		$this->response($GroupUser[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('GroupUser'=>$nama);
		$GroupUser=$this->ModelGroupUser->GetLike($where)->result();
		$this->response($GroupUser[0], 200);
	}
}
?>
