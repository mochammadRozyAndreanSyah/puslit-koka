<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pemesananbarang_model');
	}
	
	public function index()
	{

		$data['id'] = $this->Pemesananbarang_model->get_barang();
		$data['cs'] = $this->Pemesananbarang_model->get_customers();
		

		$this->load->view('partial/head.php');
		$this->load->view('partial/navbar.php');
		$this->load->view('partial/sidebar.php');
		$this->load->view('pemesanan_barang', $data);
		$this->load->view('partial/footer.php');
		$this->load->view('partial/js.php');
		$this->load->view('partial/foot');

	}

	

	function data_barang() //ajax data barang
	{
		$id_barang	= $this->input->post("id_barang");

		$data = $this->Pemesananbarang_model->get_data($id_barang);
		echo json_encode($data);
	}

	

	function data_customers() // ajax data customers
	{
		$id_customers = $this->input->post("id_customers");

		$data = $this->Pemesananbarang_model->data_customers($id_customers);
		echo json_encode($data);
	}

	function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('id_pemesanan'),
			'id_barang' => $this->input->post('id_barang'), 
			'name' => $this->input->post('nama_produk'),
			'jenis' => $this->input->post('jenis'),
			'kategori' => $this->input->post('kategori'),
			'satuan' => $this->input->post('satuan'),
			'price' => $this->input->post('harga'),
			'exp' => $this->input->post('exp'), 
			'qty' => $this->input->post('jumlah'), 
		);
		$this->cart->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
	}

	function show_cart(){ //Fungsi untuk menampilkan Cart
		$output = '';
		$no = 0;
		foreach ($this->cart->contents() as $items) {
			$no++;
			$output .='
				<tr>
					<td>'.$items['id_barang'].'</td>
					<td>'.$items['name'].'</td>
					<td>'.$items['jenis'].'</td>
					<td>'.$items['kategori'].'</td>
					<td>'.$items['satuan'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td>'.$items['exp'].'</td>
					<td>'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
			</tr>
		';
		return $output;
	}

	function load_cart(){ //load data cart
		echo $this->show_cart();
	}

	function hapus_cart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	
}
