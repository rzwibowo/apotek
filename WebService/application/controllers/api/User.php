<?php
defined('BASEPATH')	or exit('ga boleh ada direct script');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class User extends REST_Controller {

  function __construct($config = 'rest')
	{
		# code...
		parent::__construct($config);
  //  if($this->session->userdata('status') != "login"){
		//	redirect(base_url("login"));
		//}
    $this->load->model('ModelUser');
	}

	// function index(){
	// 	$this->load->view('vw_user');
	// }
  function UserAutorization_post()
	{
		# code...
    $UserPost = $this->post('body');
  //  var_dump($UserPost);
		$User=$this->ModelUser->AutUser($UserPost->Username,$UserPost->Password)->result();
		$this->response($User, 200);
	}
}
