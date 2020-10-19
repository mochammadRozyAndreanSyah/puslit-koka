<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_customers extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Datacustomers_model');
	}

	
	public function index()
	{

		$data['customers'] = $this->Datacustomers_model->ambil_data();
		$data['kode'] = $this->Datacustomers_model->id_customers();
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('data_customers', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}

	function tambah()
	{
		$id_customers = $this->input->post("id_customers_isi");
		$nama_customers = $this->input->post("nama_customers_isi");
		$nama_perusahaan = $this->input->post("nama_perusahaan_isi");
		$alamat = $this->input->post("alamat_isi");
		$no_telp = $this->input->post("no_telp_isi");
		$alamat_perusahaan = $this->input->post("alamat_perusahaan_isi");


		$data = array(
			'id_customers' 				=> $id_customers,
			'nama_customers'			=> $nama_customers,
			'nama_perusahaan'			=> $nama_perusahaan,
			'alamat'					=> $alamat,
			'no_telp'					=> $no_telp,
			'alamat_perusahaan'			=> $alamat_perusahaan
			
		);

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->Datacustomers_model->tambahdata($data, $id_customers);
		redirect("data_customers");
	}

	function edit()
	{
		$id_customers = $this->input->post("id_customers_edit");
		$nama_customers = $this->input->post("nama_customers_edit");
		$nama_perusahaan = $this->input->post("nama_perusahaan_edit");
		$alamat = $this->input->post("alamat_edit");
		$no_telp = $this->input->post("no_telp_edit");
		$alamat_perusahaan = $this->input->post("alamat_perusahaan_edit");

		$data = array(
			'id_customers' 				=> $id_customers,
			'nama_customers'			=> $nama_customers,
			'nama_perusahaan'			=> $nama_perusahaan,
			'alamat'					=> $alamat,
			'no_telp'					=> $no_telp,
			'alamat_perusahaan'			=> $alamat_perusahaan
		);

		$this->Datacustomers_model->editdata($data, $id_customers);
		redirect("data_customers");
	}

	public function hapus($hapus)
	{
		$id_customers = $hapus;
		// print_r($id_barang);
		$this->Datacustomers_model->hapusdata($id_customers);
		redirect("data_customers");
	}
}
