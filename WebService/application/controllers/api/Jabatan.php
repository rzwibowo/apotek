<?php
	defined('BASEPATH')	or exit('ga boleh ada direct script');
	require APPPATH . '/libraries/REST_Controller.php';
	use Restserver\Libraries\REST_Controller;
	/**
	*
	*/
	class Jabatan extends REST_Controller
	{

		function __construct($config = 'rest')
		{
			# code...
			parent::__construct($config);
			$this->load->model('md_jabatan');
		}

		function index()
		{
			# code...
			$data['jabatan']=$this->md_jabatan->get_jabatan()->result();
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('jabatan/vw_jabatan',$data);
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_jabatan()
		{
			# code...
			$this->load->view('layout/head_include');
			$this->load->view('layout/head_navbar');
			$this->load->view('jabatan/vw_add_jabatan');
			$this->load->view('layout/foot_footer');
			$this->load->view('layout/foot_include');
		}

		function add_action()
		{
			# code...
			$kd_jbt=$this->input->post('kd_jbt');
			$nama_jbt=$this->input->post('nama_jbt');

			$data=array(
                'kd_jbt'=>$kd_jbt,
				        'nama_jbt'=>$nama_jbt
			);

			$this->md_jabatan->insert_jabatan($data,'jabatan');
			redirect('jabatan/index');
		}

		function delete($id)
		{
			# code...
			$where=array('id'=>$id);
			$this->md_jabatan->delete_jabatan($where,'user');
			redirect('jabatan/vw_jabatan');
		}

		function edit($id)
		{
			# code...
			$where=array('id'=>$id);
			$data['user']=$this->md_jabatan->edit_jabatan($where,'user')->result();
			$this->load->view('jabatan/vw_edit',$data);
		}

		function update_action()
		{
			# code...
			$kd_jabatan=$this->input->post('kd_jabatan');
			$gol_jabatan=$this->input->post('gol_jabatan');
			$nama_jabatan=$this->input->post('nama_jabatan');
			$stok_jabatan=$this->input->post('stok_jabatan');
			$harga_satuan=$this->input->post('harga_satuan');
			$kadaluarsa=$this->input->post('kadaluarsa');

			$data=array(
                'gol_jabatan'=>$gol_jabatan,
				'nama_jabatan'=>$nama_jabatan,
				'stok_jabatan'=>$stok_jabatan,
                'harga_satuan'=>$harga_satuan,
                'kadaluarsa'=>$kadaluarsa
			);

			$where=array(
				'kd_jabatan'=>$kd_jabatan
			);

			$this->md_jabatan->update_jabatan($where,$data,'user');
			redirect('jabatan/vw_jabatan');
		}
	}
?>
