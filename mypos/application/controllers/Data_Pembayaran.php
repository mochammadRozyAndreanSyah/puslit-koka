<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pembayaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();      
		$this->load->model('Datapembayaran_model');

	}

	
	public function index()
	{

		$data['pembayaran']	= $this->Datapembayaran_model->pembayaran_data();
		// $data['dp']	= $this->Datapembayaran_model->pemesanan_detail();
		
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('data_pembayaran', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


    }
    
    function edit()
	{
		$id_pembayaran = $this->input->post("id_pembayaran");
		$tanggal_pembayaran = $this->input->post("tanggal_pembayaran");
		$potongan = $this->input->post("potongan");
		$total_tagihan = $this->input->post("total_tagihan");
		$term_1 = $this->input->post("term_1");
		$term_2 = $this->input->post("term_2");
		$term_3 = $this->input->post("term_3");
		$status = $this->input->post("status");

		$data = array(
			'id_pembayaran' 				=> $id_pembayaran,
			'tanggal_pembayaran'			=> $tanggal_pembayaran,
			'potongan'						=> $potongan,
			'total_tagihan'					=> $total_tagihan,
			'term_1'					    => $term_1,
			'term_2'						=> $term_2,
			'term_3'						=> $term_3,
			'status'						=> $status
		);

		$this->Datapembayaran_model->edit($data, $id_pembayaran);
		redirect("data_pembayaran");
    }
    
	public function print($id)
    {
        // $id = $this->uri->segment(4);
        $get = $this->Datapembayaran_model->get_where_trans('pembayaran', array('pembayaran.id_pembayaran' => $id))->row();
        // $data['get_det'] = $this->Datapembayaran_model->get_detail_trans(array('detail_pemesanan.id_pemesanan' => $id), 'detail_pemesanan')->result();

        // $data['id_pemesanan'] = $get->id_pemesanan;
        $data['tanggal_pembayaran'] = $get->tanggal_pembayaran;
        $data['total_tagihan'] = $get->total_tagihan;
         

		$data['trans'] = $this->Datapembayaran_model->pembayaran_new($id);
        $data['id_pembayaran'] = $id;

        // $data['total_bayar'] = $get->total_bayar;
        // $data['kembalian'] = $get->kembalian;

        // $this->load->view('partial/header');
        // $this->load->view('partial/sidebar');
        // $this->load->view('partial/navbar');
        $this->load->view('print_invoice', $data);
        // $this->load->view('partial/footer');
        $this->load->view('partial/js');
    }

}
