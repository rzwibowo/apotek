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
			$this->load->model('md_gol_obat');
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
			$data['obat_gol']=$this->md_gol_obat->get_gol_obat()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('obat/vw_obat_FormAdd',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_action()
		{
			# code...
			$kodeObat ="";
			$kd_obat = $this->input->post('kd_obat');
			$gol_obat = $this->input->post('gol_obat');
			$nama_obat = $this->input->post('nama_obat');
			$stok_obat = $this->input->post('stok_obat');
			$harga_satuan = $this->input->post('harga_satuan');
			$kadaluarsa = $this->input->post('tgl_kadaluarsa');

			$idObatLast = $this->md_obat->LastRecord()->result();
			$idObatLast = $idObatLast[0]->id_obat;
			$idObatLast = $idObatLast + 1;
			$kodeGolongan = $this->md_gol_obat->GatById(array('id_gol'=>$gol_obat))->result();
			$kodeObat = $this->md_obat->GenerateKodeObat($idObatLast,$kodeGolongan[0]->kd_gol);
			$data=array(
				        'id_gol'=>$gol_obat,
								'kode_obat'=>$kodeObat,
								'nama_obat'=>$nama_obat,
								'stok_obat'=>$stok_obat,
                'harga_satuan'=>$harga_satuan,
                'tgl_kadaluarsa'=>$kadaluarsa
			);
			$this->md_obat->insert_obat($data,'obat');
		  redirect('obat/index');
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
			$where=array('id_obat'=>$id);
			$data['obat']=$this->md_obat->GetObatById($where,'obat')->result();
			$data['obat_gol']=$this->md_gol_obat->get_gol_obat()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('obat/vw_obat_FormUpdate',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function update_action()
		{
			# code...
			$id_obat =$this->input->post('id_obat');
			$gol_obat=$this->input->post('gol_obat');
			$nama_obat=$this->input->post('nama_obat');
			$stok_obat=$this->input->post('stok_obat');
			$harga_satuan=$this->input->post('harga_satuan');
			$kadaluarsa=$this->input->post('tgl_kadaluarsa');

			$data=array(
                'id_gol'=>$gol_obat,
								'nama_obat'=>$nama_obat,
								'stok_obat'=>$stok_obat,
                'harga_satuan'=>$harga_satuan,
                'tgl_kadaluarsa'=>$kadaluarsa
							);

			$where=array(
				'id_obat'=>$id_obat
			);
			$this->md_obat->update_obat($where,$data,'obat');
			redirect('obat/index');
		}
		function view($id)
		{
			# code...
			$where=array('id_obat'=>$id);
			$data['obat']=$this->md_obat->GetObatById($where,'obat')->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('obat/vw_obat_view',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}
	}
?>
