<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_barang extends CI_Controller {

	function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Stockbarang_Model");
		}

	
	public function index()
	{

		$data['barang'] = $this->Stockbarang_Model->stock();
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('stock_barang', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
}
