<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Karyawan extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelKaryawan');
	}

	function GetKaryawanAll_get()
	{
		# code...
		$data=$this->ModelKaryawan->GetKaryawan()->result();
		$this->response($data, 200);
	}
	function GetKaryawanAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelKaryawan->GetKaryawanWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataKaryawan_post()
	{
		# code...
		$Karyawan= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Karyawan->IdKaryawan == null){
      $Karyawan->Password = md5("admin");
			$Karyawan->TanggalDiBuat = $Date;
			$Karyawan->TanggalDiUbah = $Date;
			if($this->ModelKaryawan->InsertKaryawan($Karyawan,'Karyawan')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Karyawan->TanggalDiUbah = $Date;
			$Where=array(
				'IdKaryawan'=>$Karyawan->IdKaryawan
			);
			if($this->ModelKaryawan->UpdateKaryawan($Where,$Karyawan,'Karyawan')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataKaryawanById_get($Id)
	{
		# code...
		$where=array('IdKaryawan'=>$Id);
		$Karyawan=$this->ModelKaryawan->GatById($where,'Karyawan')->result();
		$this->response($Karyawan[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Karyawan'=>$nama);
		$Karyawan=$this->ModelKaryawan->GetLike($where)->result();
		$this->response($Karyawan[0], 200);
	}
}
?>
