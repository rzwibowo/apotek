<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Kategori extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelKategori');
	}

	function GetKategoriAll_get()
	{
		# code...
		$data=$this->ModelKategori->GetKategori()->result();
		$this->response($data, 200);
	}
	function GetKategoriAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelKategori->GetKategoriWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataKategori_post()
	{
		# code...
		$Kategori= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Kategori->IdKategori == null){
			$Kategori->TanggalDiBuat = $Date;
			$Kategori->TanggalDiUbah = $Date;
			if($this->ModelKategori->InsertKategori($Kategori,'Kategori')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$Kategori->TanggalDiUbah = $Date;
			$Where=array(
				'IdKategori'=>$Kategori->IdKategori
			);
			if($this->ModelKategori->UpdateKategori($Where,$Kategori,'Kategori')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataKategoriById_get($Id)
	{
		# code...
		$where=array('IdKategori'=>$Id);
		$Kategori=$this->ModelKategori->GatById($where,'Kategori')->result();
		$this->response($Kategori[0], 200);
	}
	function AutoComplite_get($nama){
		$where=array('Kategori'=>$nama);
		$Kategori=$this->ModelKategori->GetLike($where)->result();
		$this->response($Kategori[0], 200);
	}
}
?>
