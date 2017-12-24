<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Pembelian extends REST_Controller
{
	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelPembelian');

		//$this->load->model('obat');
	}


	function GetDataPembelian_get()
	{
		# code...
		$Pembelian=$this->ModelPembelian->GetDataPembelian()->result();
		$this->response($Pembelian, 200);
	}

	function SaveDataPembelian_post()
	{
		# code...
		$Pembelian = json_decode(json_encode($this->post('body')));
		$PembelianModel =$this->ModelPembelian->PembelianModelObject;
		$DetailPembelianModel =$Pembelian->DetailPembelian;
		if($Pembelian->IdPembelian == null){
			$PembelianModel->IdSupplier = $Pembelian->IdSupplier;
			$PembelianModel->TanggalPembelian = $Pembelian->TanggalPembelian;
			$PembelianModel->TotalJumlahObat = $Pembelian->TotalJumlahObat;
			$PembelianModel->TotalHargaBeli = $Pembelian->TotalHargaBeli;
			$PembelianModel->StatusPembelian =0;
			if($this->ModelPembelian->InsertPembelian($PembelianModel,'Pembelian')){
				if($this->ModelPembelian->InsertDetail('PembelianDetail',$DetailPembelianModel)){
					$this->response(array('status' => 'sukses'), 200);
				}else{
					$this->response(array('error' => 'Entity Detail could not be created'), 404);
				}
			}else {
				$this->response(array('error' => 'Entity could not be created'), 404);
			}
		}else {
			if($this->ModelPembelian->UpdatePembelian($Pembelian)){
					$this->response(array('status' => 'sukses'), 200);
			}else{
					$this->response(array('error' => 'Entity could not be created'), 404);
			}
		}
	}

	function GetDataPembelianById_get($IdPembelian,$edit)
	{
		# code...
		$Pembelian =$this->ModelPembelian->GetPembelianById($IdPembelian,$edit);
		$this->response($Pembelian, 200);
	}
}
?>
