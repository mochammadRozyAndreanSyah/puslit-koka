<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_bulanan extends CI_Controller {

	
	public function index()
	{

		
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('penjualan_bulanan');
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
}
