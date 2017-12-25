<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Penjualan extends REST_Controller
{
	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelPenjualan');

		//$this->load->model('obat');
	}


	function GetDataPenjualan_get()
	{
		# code...
		$Penjualan=$this->ModelPenjualan->GetDataPenjualan()->result();
		$this->response($Penjualan, 200);
	}

	function SaveDataPenjualan_post()
	{
		# code...
		$Penjualan = json_decode(json_encode($this->post('body')));
		$PenjualanModel =$this->ModelPenjualan->PenjualanModelObject;
		$DetailPenjualanModel =$Penjualan->DetailPenjualan;
		if($Penjualan->IdPenjualan == null){
			$PenjualanModel->IdPenjualan = $Penjualan->IdPenjualan;
			$PenjualanModel->TanggalJual = getdate();
			$PenjualanModel->IdPegawai = 0;
			$PenjualanModel->TotalHargaJual = $Penjualan->TotalHargaJual;
			$PenjualanModel->TotalJumlahObat = $Penjualan->TotalJumlahObat;
			if($this->ModelPenjualan->InsertPenjualan($PenjualanModel,'Penjualan')){
				if($this->ModelPenjualan->InsertDetail('PenjualanDetail',$DetailPenjualanModel)){
					$this->response(array('status' => 'sukses'), 200);
				}else{
					$this->response(array('error' => 'Gagal Menyimpan Data'), 404);
				}
			}else {
				$this->response(array('error' => 'Gagal Menyimpan Data Detail'), 404);
			}
		}else {
			if($this->ModelPenjualan->UpdatePenjualan($Penjualan)){
					$this->response(array('status' => 'sukses'), 200);
			}else{
					$this->response(array('error' => 'Entity could not be created'), 404);
			}
		}
	}

	function GetDataPenjualanById_get($IdPenjualan,$edit)
	{
		# code...
		$Penjualan =$this->ModelPenjualan->GetPenjualanById($IdPenjualan,$edit);
		$this->response($Penjualan, 200);
	}
}
?>
