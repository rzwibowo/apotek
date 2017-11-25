<?php
	defined('BASEPATH')	or exit('ga boleh ada direct script');
	require APPPATH . '/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;
	/**
	*
	*/
	class Pegawai extends REST_Controller
	{

		function __construct($config = 'rest')
		{
			# code...
			parent::__construct($config);
			$this->load->model('md_pegawai');
      $this->load->model('md_jabatan');
		}

		function index()
		{
			# code...
			$data['pegawai']=$this->md_pegawai->get_pegawai()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('pegawai/vw_pegawai',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_pegawai()
		{
			# code...
      $data['jabatan']=$this->md_jabatan->get_jabatan()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('pegawai/vw_add_pegawai',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_action()
		{
			# code...
			$nama_pgw=$this->input->post('nama_pgw');
			$alamat=$this->input->post('alamat');
			$jenis_kel=$this->input->post('jenis_kel');
			$kode_jbt=$this->input->post('kode_jbt');

			$data=array(
                'nama_pgw'=>$nama_pgw,
        				'alamat'=>$alamat,
        				'jenis_kel'=>$jenis_kel,
                'kode_jbt'=>$kode_jbt
			);

			$this->md_pegawai->insert_pegawai($data,'pegawai');
			redirect('pegawai/index');
		}

		function delete($id)
		{
			# code...
			$where=array('id'=>$id);
			$this->md_pegawai->delete_pegawai($where,'user');
			redirect('pegawai/vw_pegawai');
		}

		function edit($id)
		{
			# code...
			$where=array('id'=>$id);
			$data['user']=$this->md_pegawai->edit_pegawai($where,'user')->result();
			$this->load->view('pegawai/vw_edit',$data);
		}

		function update_action()
		{
			# code...
			$kd_pegawai=$this->input->post('kd_pegawai');
			$gol_pegawai=$this->input->post('gol_pegawai');
			$nama_pegawai=$this->input->post('nama_pegawai');
			$stok_pegawai=$this->input->post('stok_pegawai');
			$harga_satuan=$this->input->post('harga_satuan');
			$kadaluarsa=$this->input->post('kadaluarsa');

			$data=array(
                'gol_pegawai'=>$gol_pegawai,
				'nama_pegawai'=>$nama_pegawai,
				'stok_pegawai'=>$stok_pegawai,
                'harga_satuan'=>$harga_satuan,
                'kadaluarsa'=>$kadaluarsa
			);

			$where=array(
				'kd_pegawai'=>$kd_pegawai
			);

			$this->md_pegawai->update_pegawai($where,$data,'user');
			redirect('pegawai/vw_pegawai');
		}
	}
?>
