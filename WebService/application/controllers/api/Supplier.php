<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Supplier extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('MdSupplier');
		//$this->load->model('obat');
	}

	function GetDataSupplier_get()
	{
		# code...
		$Supplier=$this->MdSupplier->GetSupplier()->result();
		$this->response($Supplier, 200);
	}
	function GetDataSupplier_post()
	{
		# code...
		$Filter = $this->post('body');
		$Supplier=$this->MdSupplier->GetSupplierWithFilter($Filter)->result();
		$this->response($Supplier, 200);
	}


	function SaveDataSupplier_post()
	{
		// 		# code...
		$Supplier = (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($Supplier->IdSupplier == null){
			$Supplier->TanggalDiBuat = $Date;
			$Supplier->TanggalDiUbah = $Date;
			if($this->MdSupplier->InsertSupplier($Supplier,'Supplier')){
				$this->response(array('status' => 'sukses'), 200);
			}else {
				$this->response(array('error' => 'Gagal Simpan Data'), 404);
			}
		}
		else{
			$Supplier->TanggalDiUbah = $Date;
			$Where=array(
				'IdSupplier'=>$Supplier->IdSupplier
			);
			if($this->MdSupplier->UpdateSupplier($Where,$Supplier,'Supplier')){
				$this->response(array('status' => 'sukses'), 200);
			}else {
				$this->response(array('error' => 'Gagal Simpan Data'), 404);
			}
		}
	}
		function GatDataSupplierById_get($Id)
		{
			# code...
			$Where=array('IdSupplier'=>$Id);
			$Supplier=$this->MdSupplier->GetById($Where)->result();
			$this->response($Supplier[0], 200);
		}
}
?>
