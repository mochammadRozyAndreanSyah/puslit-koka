<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_barang extends CI_Controller {

    function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Pembayaranbarang_model');
    }
    
    public function index()
	{

		$data['pb'] = $this->Pembayaranbarang_model->get_pemesanan();
		
		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		
		$this->load->view('partial/sidebar.php');
		$this->load->view('pembayaran_barang',$data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');


	}

	function data_pemesanann()
	{
		$id_pemesanan = $this->input->post("id_pemesanan");

		$data = $this->Pembayaranbarang_model->data_pemesanan($id_pemesanan);
		echo json_encode($data);
	}

	function add()
	{
		$id_pembayaran 	= $this->input->post("id_pembayaran");
		$tgl 			= $this->input->post("tanggal_pembayaran");
		$tanggal_pembayaran 		= date("Y-m-d", strtotime($tgl));
		$potongan = $this->input->post("potongan");
		$total_tagihan	= $this->input->post("total_tagihan");
		$status = $this->input->post("status");

		$data 			= array(
			'id_pembayaran' 		=> $id_pembayaran,
			// 'id_user'			=> $id_user,
			'tanggal_pembayaran' 			=> $tanggal_pembayaran,
			'potongan' => $potongan,
			'total_tagihan' 		=> $total_tagihan,
			'term_1' => $this->_uploadImage1(),
            'term_2' => $this->_uploadImage2(),
			'term_3' => $this->_uploadImage3(),
			'status' => $status
		);
		$this->Pembayaranbarang_model->add($data, $id_pembayaran);
		$this->session->set_flashdata('success', ' Ditambahkan');
		redirect("pembayaran_barang");
		
	}

	// public function tambahbuktipembayaran($id_pembayaran)
    // {
    //     $data = array(
	// 		'id_pembayaran' =>$id_pembayaran,
	// 		'term_1' => $this->_uploadImage1(),
    //         'term_2' => $this->_uploadImage2(),
    //         'term_3' => $this->_uploadImage3(),
	// );
 	
    //     $this->pembayaranbarang_model->add('pembayaran', $data);
	// 	$this->session->set_flashdata('success', ' Ditambahkan');
	// 	redirect("pembayaran_barang");

	// }
		private function _uploadImage1()
    {
        $config['upload_path']          = './upload/buktipembayaran/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('term_1')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
	}
	private function _uploadImage2()
    {
        $config['upload_path']          = './upload/buktipembayaran/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('term_2')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
	}
	private function _uploadImage3()
    {
        $config['upload_path']          = './upload/buktipembayaran/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('term_3')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }



}