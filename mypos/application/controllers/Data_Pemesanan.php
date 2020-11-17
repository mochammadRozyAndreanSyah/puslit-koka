<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemesanan extends CI_Controller {

	function __construct()
	{
		parent::__construct();      
		$this->load->model('Datapemesanan_model');

	}

	
	public function index()
	{

		$data['pemesanan']	= $this->Datapemesanan_model->pemesanan_data();
		$data['dp']	= $this->Datapemesanan_model->pemesanan_detail();
		
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('data_pemesanan', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}
	public function print($id)
    {
        // $id = $this->uri->segment(4);
        $get = $this->Datapemesanan_model->get_where_trans('pemesanan', array('pemesanan.id_pemesanan' => $id))->row();
        $data['get_det'] = $this->Datapemesanan_model->get_detail_trans(array('detail_pemesanan.id_pemesanan' => $id), 'detail_pemesanan')->result();

        // $data['id_pemesanan'] = $get->id_pemesanan;
        $data['tanggal'] = $get->tanggal;
        $data['total_harga'] = $get->total_harga;
         $halo = [
            'detail_pemesanan.id_pemesanan' => $id
        ];

		$data['trans'] = $this->Datapemesanan_model->pemesanan_detail_new($id);
        $data['id_pemesanan'] = $id;

        // $data['total_bayar'] = $get->total_bayar;
        // $data['kembalian'] = $get->kembalian;

        // $this->load->view('partial/header');
        // $this->load->view('partial/sidebar');
        // $this->load->view('partial/navbar');
        $this->load->view('print_data', $data);
        // $this->load->view('partial/footer');
        $this->load->view('partial/js');
    }

}
