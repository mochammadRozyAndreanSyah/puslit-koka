<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_bulanan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Penjualanbulanan_model');
        
    }
	
	public function index()
	{

		$year = $this->input->post('tahun');
		$month = $this->input->post('bulan');
		if ($year == null && $month == null) {
			# code...
			$data['all'] = $this->Penjualanbulanan_model->get_laporan();
		} else {
			$data['all'] = $this->Penjualanbulanan_model->getTransaksiMonth($year, $month);
		}
		$data['year'] = $this->Penjualanbulanan_model->getYear();

		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('penjualan_bulanan',$data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
	// function print()
	// {
	// 	$year = $this->uri->segment(5);
	// 	$month = $this->uri->segment(4);

	// 	if ($year == null && $month == null) {
	// 		# code...
	// 		$data['data'] = $this->Penjualanbulanan_model->get_laporan();
	// 	} else {
	// 		$data['data'] = $this->Penjualanbulanan_model->getTransaksiMonth($year, $month);
	// 	}
	// 	$this->load->view("partials/main/header/header_print");
	// 	$this->load->view("content/apoteker/print_laporan_bulanan", $data);
	// 	$this->load->view("partials/main/footer");
	// }
	function show_cart()
	{
		$year = $this->input->post("tahun");
		$month = $this->input->post("bulan");
		if ($year == null && $month == null) {
			# code...
			$data = $this->Penjualanbulanan_model->get_laporan();
		} else {
			$data = $this->Penjualanbulanan_model->getTransaksiMonth($year, $month);
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
		echo $output;
	}

	function load_cart()
	{
		echo $this->show_cart();
	}
	
}
