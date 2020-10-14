<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemesanan extends CI_Controller {

	
	public function index()
	{

		
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('data_pemesanan');
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
}
