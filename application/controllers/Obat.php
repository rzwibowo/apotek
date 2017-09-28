<?php
	defined('BASEPATH')	or exit('ga boleh ada direct script');

	/**
	* 
	*/
	class Obat extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('md_obat');
		}

		function index()
		{
			# code...
			$data['obat']=$this->md_obat->get_obat()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('obat/vw_obat',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_obat()
		{
			# code...
			$this->load->view('obat/vw_add');
		}

		function add_action()
		{
			# code...
			$kd_obat=$this->input->post('kd_obat');
			$gol_obat=$this->input->post('gol_obat');
			$nama_obat=$this->input->post('nama_obat');
			$stok_obat=$this->input->post('stok_obat');
			$harga_satuan=$this->input->post('harga_satuan');
			$kadaluarsa=$this->input->post('kadaluarsa');

			$data=array(
                'gol_obat'=>$gol_obat,
				'nama_obat'=>$nama_obat,
				'stok_obat'=>$stok_obat,
                'harga_satuan'=>$harga_satuan,
                'kadaluarsa'=>$kadaluarsa
			);

			$this->md_obat->insert_obat($data,'obat');
			redirect('obat/vw_obat');
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
			$where=array('id'=>$id);
			$data['user']=$this->md_obat->edit_obat($where,'user')->result();
			$this->load->view('obat/vw_edit',$data);
		}

		function update_action()
		{
			# code...
			$kd_obat=$this->input->post('kd_obat');
			$gol_obat=$this->input->post('gol_obat');
			$nama_obat=$this->input->post('nama_obat');
			$stok_obat=$this->input->post('stok_obat');
			$harga_satuan=$this->input->post('harga_satuan');
			$kadaluarsa=$this->input->post('kadaluarsa');

			$data=array(
                'gol_obat'=>$gol_obat,
				'nama_obat'=>$nama_obat,
				'stok_obat'=>$stok_obat,
                'harga_satuan'=>$harga_satuan,
                'kadaluarsa'=>$kadaluarsa
			);

			$where=array(
				'kd_obat'=>$kd_obat
			);

			$this->md_obat->update_obat($where,$data,'user');
			redirect('obat/vw_obat');
		}
	}
?>