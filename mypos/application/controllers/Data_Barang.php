<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Databarang_model');
	}

	public function index()
	{

		$data['barang'] = $this->Databarang_model->ambil_data();
		$data['kode'] = $this->Databarang_model->id_barang();
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('data_barang', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
	function tambah()
	{
		$id_barang = $this->input->post("id_barang_isi");
		$nama_produk = $this->input->post("nama_produk_isi");
		$jenis = $this->input->post("jenis_isi");
		$kategori = $this->input->post("kategori_isi");
		$satuan = $this->input->post("satuan_isi");
		$harga = $this->input->post("harga_isi");
		$exp = $this->input->post("exp_isi");
		$stock = $this->input->post("stock_isi");



		$data = array(
			'id_barang' 				=> $id_barang,
			'nama_produk'				=> $nama_produk,
			'jenis'						=> $jenis,
			'kategori'					=> $kategori,
			'satuan'					=> $satuan,
			'harga'						=> $harga,
			'exp'						=> $exp,
			'stock'						=> $stock
		);

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->Databarang_model->tambahdata($data, $id_barang);
		redirect("data_barang");
	}

	function edit()
	{
		$id_barang = $this->input->post("id_barang_edit");
		$nama_produk = $this->input->post("nama_produk_edit");
		$jenis = $this->input->post("jenis_edit");
		$kategori = $this->input->post("kategori_edit");
		$satuan = $this->input->post("satuan_edit");
		$harga = $this->input->post("harga_edit");
		$exp = $this->input->post("exp_edit");
		$stock = $this->input->post("stock_edit");

		$data = array(
			'id_barang' 				=> $id_barang,
			'nama_produk'				=> $nama_produk,
			'jenis'						=> $jenis,
			'kategori'					=> $kategori,
			'satuan'					=> $satuan,
			'harga'						=> $harga,
			'exp'						=> $exp,
			'stock'						=> $stock
		);

		$this->Databarang_model->editdata($data, $id_barang);
		redirect("data_barang");
	}

	public function hapus($hapus)
	{
		$id_barang = $hapus;
		// print_r($id_barang);
		$this->Databarang_model->hapusdata($id_barang);
		redirect("data_barang");
	}
}
