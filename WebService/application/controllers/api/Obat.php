<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class Obat extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelObat');
		$this->load->model('ModelGolongan');
	}

	function GetDataObat_post()
	{
		$Filter = $this->post('body');
		# code...
		$JumlahData=$this->ModelObat->JumlahData();
		$this->load->library('pagination');
		$Config['base_url']=base_url().'index.php/obat/index/';
		$Config['total_rows']=$JumlahData;
		$Config['per_page']=10;
		$Config['attributes'] = array('class' => 'page-link');

		$From=$this->uri->segment(3);
		$this->pagination->initialize($Config);
		$Obat=$this->ModelObat->GetObat($Config['per_page'],$From,$Filter)->result();
		$this->response($Obat, 200);
	}

	function SaveDataObat_post()
	{
		# code...
		$Obat =  (object) $this->post('body');
		//Insert Data
		if($Obat->IdObat == NULL){
			$Obat->KodeObat = $this->ModelObat->GenerateKodeObat($Obat->IdGolongan);
			if($this->ModelObat->InsertObat($Obat,'Obat')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Entity could not be created'), 404);
			}
			//Update Data
		}else {
			$Where=array(
				'IdObat'=>$Obat->IdObat
			);
			if($this->ModelObat->UpdateObat($Where,$Obat,'Obat')){
				$this->response(array('status' => 'sukses'), 200);
			}else {
				# code...
				$this->response(array('error' => 'Entity could not be created'), 404);
			}
		}

	}

	function Delete_delete($id)
	{
		# code...
		$where=array('id'=>$id);
		$this->md_obat->delete_obat($where,'user');
	}
	function GatDataObatById_get($Id,$IsEdit)
	{
		# code...
		$where=array('IdObat'=>$Id);
		$Obat=$this->ModelObat->GetObatById($where,'Obat',$IsEdit)->result();
		$this->response($Obat[0], 200);
	}
}
?>
