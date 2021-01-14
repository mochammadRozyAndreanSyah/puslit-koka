<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Penjualanbulanan_model");
		$this->load->model('Grafik_model');
	}

	
	public function index()
	{

		$tahun = $this->input->post('tahun');
		if ($tahun == null) {
			# code...
			foreach ($this->Grafik_model->data_penjualan_perbulan() as $row) {
				$data['grafik'][] = (float) $row['Januari'];
				$data['grafik'][] = (float) $row['Februari'];
				$data['grafik'][] = (float) $row['Maret'];
				$data['grafik'][] = (float) $row['April'];
				$data['grafik'][] = (float) $row['Mei'];
				$data['grafik'][] = (float) $row['Juni'];
				$data['grafik'][] = (float) $row['Juli'];
				$data['grafik'][] = (float) $row['Agustus'];
				$data['grafik'][] = (float) $row['September'];
				$data['grafik'][] = (float) $row['Oktober'];
				$data['grafik'][] = (float) $row['November'];
				$data['grafik'][] = (float) $row['Desember'];
			}
		} else {
			foreach ($this->Grafik_model->get_data_penjualan_perbulan($tahun) as $row) {
				$data['grafik'][] = (float) $row['Januari'];
				$data['grafik'][] = (float) $row['Februari'];
				$data['grafik'][] = (float) $row['Maret'];
				$data['grafik'][] = (float) $row['April'];
				$data['grafik'][] = (float) $row['Mei'];
				$data['grafik'][] = (float) $row['Juni'];
				$data['grafik'][] = (float) $row['Juli'];
				$data['grafik'][] = (float) $row['Agustus'];
				$data['grafik'][] = (float) $row['September'];
				$data['grafik'][] = (float) $row['Oktober'];
				$data['grafik'][] = (float) $row['November'];
				$data['grafik'][] = (float) $row['Desember'];
			}
		}
		$data['year'] = $this->Penjualanbulanan_model->getYear();


		$data['data'] = $this->Grafik_model->get_data_penjualan();

		$tahun = $this->input->post('tahun_barang');
		$id_barang = $this->input->post('id_barang');
		if ($id_barang == null && $tahun == null) {

			foreach ($this->Grafik_model->get_penjualan_barang() as $row) {
				$data['data_barang'][] = (float) $row['Januari'];
				$data['data_barang'][] = (float) $row['Februari'];
				$data['data_barang'][] = (float) $row['Maret'];
				$data['data_barang'][] = (float) $row['April'];
				$data['data_barang'][] = (float) $row['Mei'];
				$data['data_barang'][] = (float) $row['Juni'];
				$data['data_barang'][] = (float) $row['Juli'];
				$data['data_barang'][] = (float) $row['Agustus'];
				$data['data_barang'][] = (float) $row['September'];
				$data['data_barang'][] = (float) $row['Oktober'];
				$data['data_barang'][] = (float) $row['November'];
				$data['data_barang'][] = (float) $row['Desember'];
			}
		} else {
			foreach ($this->Grafik_model->get_data_penjualan_barang($tahun, $id_barang) as $row) {
				$data['data_barang'][] = (float) $row['Januari'];
				$data['data_barang'][] = (float) $row['Februari'];
				$data['data_barang'][] = (float) $row['Maret'];
				$data['data_barang'][] = (float) $row['April'];
				$data['data_barang'][] = (float) $row['Mei'];
				$data['data_barang'][] = (float) $row['Juni'];
				$data['data_barang'][] = (float) $row['Juli'];
				$data['data_barang'][] = (float) $row['Agustus'];
				$data['data_barang'][] = (float) $row['September'];
				$data['data_barang'][] = (float) $row['Oktober'];
				$data['data_barang'][] = (float) $row['November'];
				$data['data_barang'][] = (float) $row['Desember'];
			}
		}

		$data['barang'] = $this->Grafik_model->get_barang();

		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('grafik', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
}
