<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{

		
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		$this->load->view('partial/sidebar.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/footer_button.php');
		$this->load->view('dashboard');
		$this->load->view('partial/footer.php');
		$this->load->view('partial/foot');

	}
}
