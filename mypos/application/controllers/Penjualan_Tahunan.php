<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_tahunan extends CI_Controller {

	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Penjualantahunan_model");
	}

	
	public function index()
	{

		$year = $this->input->post('tahun');
		if ($year == null) {
			# code...
			$data['all'] = $this->Penjualantahunan_model->get_laporan();
		} else {
			$data['all'] = $this->Penjualantahunan_model->getTransaksiYear($year);
		}
		$data['year'] = $this->Penjualantahunan_model->getYear();

		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('penjualan_tahunan', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}

	// function print()
	// {
	// 	$Y = $this->uri->segment(6);
	// 	$m = $this->uri->segment(4);
	// 	$d = $this->uri->segment(5);
	// 	$tanggal =  $Y . "-" . $m . "-" . $d;
	// 	if ($tanggal == null) {
	// 		# code...
	// 		$data['data'] 	= $this->Penjualanharian_model->get_laporan();
	// 	} else {
	// 		$data['data'] 	= $this->Penjualanharian_model->get_laporan_where($tanggal);
	// 	}
	// 	$this->load->view("partials/main/header/header_print");
	// 	$this->load->view("content/apoteker/print_laporan_harian", $data);
	// 	$this->load->view("partials/main/footer");
	// }

	function show_cart()
	{
		$year = $this->input->post("tanggal_pembayaran");
		// $tanggal = "11/23/2019";
		$date = date("Y-m-d", strtotime($year));
		if ($year == null) {
			// 	# code...
			$data = $this->Penjualantahunan_model->get_laporan();
		} else {
			$data = $this->Penjualantahunan_model->getTransaksiYear($date);
		}
		$output = '';
		$no = 1;
		foreach ($data as $key) {
			$output	.= '<tr>
						<td>' . $no++ . '</td>
						<td>' . $key->id_pembayaran . '</td>
						<td>' . $key->tanggal_pembayaran . '</td>
						<td>' . $key->potongan . '</td>
						<td>' . $key->total_tagihan . '</td>
		                  </tr>';
		}
		// return $output;
		print_r($output);
	}

	function load_cart()
	{
		echo $this->show_cart();
	}
}
