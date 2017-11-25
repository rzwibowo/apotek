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
			$this->load->model('MdPembelian');
			//$this->load->model('obat');
		}

		function Index()
		{
			# code...
			$data['pembelian']=$this->MdPembelian->GetPembelian()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('Pembelian/VwPembelianIndex',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function AddPembelian()
		{
			# code...
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('pembelian/VwPembelianFormAdd');
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_action()
		{
			# code...
			$NamaPembelian = $this->input->post('NamaPembelian');
			$NomorTelepon = $this->input->post('NomorTelepon');
			$Status 			= $this->input->post('Status');
			$Alamat				= $this->input->post('Alamat');
      $data=array(
				        'NamaPembelian'=>$NamaPembelian,
								'NomorTelepon'=>$NomorTelepon,
								'Status'			=>$Status,
								'Alamat'			=>$Alamat
			);
			$this->MdPembelian->InsertPembelian($data,'Pembelian');
		  redirect('Pembelian/index');
		}

		function delete($id)
		{
			# code...
			$where=array('id'=>$id);
			$this->md_obat->delete_obat($where,'user');
			redirect('obat/vw_obat');
		}

		function edit($id)
		{
			# code...
			$where=array('IdPembelian'=>$id);
			$data['Pembelian']=$this->MdPembelian->GetPembelianByID($where)->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('Pembelian/VwPembelianFormUpdate',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function UpdateaAtion()
		{
			# code...
			$IdPembelian =$this->input->post('IdPembelian');
			$NamaPembelian=$this->input->post('NamaPembelian');
			$NomorTelepon=$this->input->post('NomorTelepon');
			$Alamat=$this->input->post('Alamat');
			$Status=$this->input->post('Status');

			$data=array(
								'NamaPembelian'=>$NamaPembelian,
								'NomorTelepon'=>$NomorTelepon,
                'Alamat'=>$Alamat,
                'Status'=>$Status
							);

			$where=array(
				'IdPembelian'=>$IdPembelian
			);
			$this->MdPembelian->UpdatePembelian($where,$data,'pembelian');
			redirect('pembelian/index');
		}
		function view($id)
		{
			# code...
			$where=array('IdPembelian'=>$id);
			$data['pembelian']=$this->MdPembelian->GetPembelianByID($where)->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('pembelian/VwPembelianView',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}
	}
?>
