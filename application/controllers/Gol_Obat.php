<?php
	defined('BASEPATH')	or exit('ga boleh ada direct script');

	/**
	* 
	*/
	class Gol_Obat extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('md_gol_obat');
		}

		function index()
		{
			# code...
            $data['gol_obat']=$this->md_gol_obat->get_gol_obat()->result();
            
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('gol_obat/vw_gol_obat',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_gol_obat()
		{
            # code...
            $this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
            $this->load->view('gol_obat/vw_gol_add');
            $this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_action()
		{
			# code...
			$kd_gol=$this->input->post('kd_gol');
			$golongan=$this->input->post('golongan');
			
			$data=array(
                'kd_gol'=>$kd_gol,
				'golongan'=>$golongan
			);

			$this->md_gol_obat->insert_gol_obat($data,'obat_gol');
			redirect('gol_obat/index');
		}

		function delete($kd_gol)
		{
			# code...
			$where=array('kd_gol'=>$kd_gol);
			$this->md_gol_obat->delete_gol_obat($where,'obat_gol');
			redirect('gol_obat/index');
		}

		function edit($kd_gol)
		{
			# code...
			$where=array('kd_gol'=>$kd_gol);
			$data['gol_obat']=$this->md_gol_obat->edit_gol_obat($where,'obat_gol')->result();

			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('gol_obat/vw_gol_edit',$data);
            $this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function update_action()
		{
			# code...
			$kd_gol=$this->input->post('kd_gol');
			$golongan=$this->input->post('golongan');
			
			$data=array(
                'kd_gol'=>$kd_gol,
				'golongan'=>$golongan
			);

			$where=array(
				'kd_gol'=>$kd_gol
			);

			$this->md_gol_obat->update_gol_obat($where,$data,'obat_gol');
			redirect('gol_obat/index');
		}
	}
?>