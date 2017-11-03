<?php
	defined('BASEPATH')	or exit('ga boleh ada direct script');

	/**
	*
	*/
	class Supplier extends CI_Controller
	{

		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('MdSupplier');
			//$this->load->model('obat');
		}

		function Index()
		{
			# code...
			$data['supplier']=$this->MdSupplier->GetSupplier()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('Supplier/VwSupplierIndex',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function AddSupplier()
		{
			# code...
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('supplier/VwSupplierFormAdd');
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_action()
		{
			# code...
			$NamaSupplier = $this->input->post('NamaSupplier');
			$NomorTelepon = $this->input->post('NomorTelepon');
			$Status 			= $this->input->post('Status');
			$Alamat				= $this->input->post('Alamat');
      $data=array(
				        'NamaSupplier'=>$NamaSupplier,
								'NomorTelepon'=>$NomorTelepon,
								'Status'			=>$Status,
								'Alamat'			=>$Alamat
			);
			$this->MdSupplier->InsertSupplier($data,'supplier');
		  redirect('supplier/index');
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
			$where=array('IdSupplier'=>$id);
			$data['supplier']=$this->MdSupplier->GetSupplierByID($where)->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('supplier/VwSupplierFormUpdate',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function UpdateaAtion()
		{
			# code...
			$IdSupplier =$this->input->post('IdSupplier');
			$NamaSupplier=$this->input->post('NamaSupplier');
			$NomorTelepon=$this->input->post('NomorTelepon');
			$Alamat=$this->input->post('Alamat');
			$Status=$this->input->post('Status');

			$data=array(
								'NamaSupplier'=>$NamaSupplier,
								'NomorTelepon'=>$NomorTelepon,
                'Alamat'=>$Alamat,
                'Status'=>$Status
							);

			$where=array(
				'IdSupplier'=>$IdSupplier
			);
			$this->MdSupplier->UpdateSupplier($where,$data,'supplier');
			redirect('supplier/index');
		}
		function view($id)
		{
			# code...
			$where=array('IdSupplier'=>$id);
			$data['supplier']=$this->MdSupplier->GetSupplierByID($where)->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('supplier/VwSupplierView',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}
	}
?>
