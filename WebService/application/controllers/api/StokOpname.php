<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
/**
*
*/
class StokOpname extends REST_Controller
{

	function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
		$this->load->model('ModelStokOpname');
	}

	function GetStokOpnameAll_get()
	{
		# code...
		$data=$this->ModelStokOpname->GetStokOpname()->result();
		$this->response($data, 200);
	}
	function GetStokOpnameAll_post()
	{
		# code...
		$Filter = $this->post('body');
		$data=$this->ModelStokOpname->GetStokOpnameWithFilter($Filter)->result();
		$this->response($data, 200);
	}
	function SaveDataStokOpname_post()
	{
		# code...
		$StokOpname= (object) $this->post('body');
		$Date = date("Y-m-d H:i:s");
		if($StokOpname->IdStokOpname == null){
			$StokOpname->TanggalDiBuat = $Date;
			$StokOpname->TanggalDiUbah = $Date;
			if($this->ModelStokOpname->InsertStokOpname($StokOpname,'StokOpname')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}else {
			$StokOpname->TanggalDiUbah = $Date;
			$Where=array(
				'IdStokOpname'=>$StokOpname->IdStokOpname
			);
			if($this->ModelStokOpname->UpdateStokOpname($Where,$StokOpname,'StokOpname')){
				$this->response(array('status' => 'sukses'), 200);
			}else{
				$this->response(array('error' => 'Error saat simpan data'), 404);
			}
		}
	}
	function GetDataStokOpnameById_get($Id)
	{
		# code...
		$where=array('IdStokOpname'=>$Id);
		$StokOpname=$this->ModelStokOpname->GatById($where,'StokOpname')->result();
		$this->response($StokOpname[0], 200);
	}
  function GetDataStokOpnameByIdView_get($Id){
    $where=array('IdStokOpname'=>$Id);
    $StokOpname=$this->ModelStokOpname->GatByIdView($where,'StokOpname')->result();
    $this->response($StokOpname[0], 200);
  }
	function AutoComplite_get($nama){
		$where=array('StokOpname'=>$nama);
		$StokOpname=$this->ModelStokOpname->GetLike($where)->result();
		$this->response($StokOpname[0], 200);
	}
}
?>
