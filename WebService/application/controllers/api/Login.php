<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Login extends REST_Controller {

  function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
  //  if($this->session->userdata('status') != "login"){
		//	redirect(base_url("login"));
		//}
    $this->load->model('ModelLogin');
	}

	// function index(){
	// 	$this->load->view('vw_user');
	// }
  function UserAutorization_post()
	{
		# code...
    $UserPost = $this->post('body');
		$User=$this->ModelLogin->AutUser($UserPost['Username'],$UserPost['Password'])->result();
		$this->response($User, 200);
	}
}
