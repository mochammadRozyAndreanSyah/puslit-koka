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

	function data_barang()
	{
		$id_barang	= $this->input->post("id_barang");

		$data = $this->Pemesananbarang_model->get_data($id_barang);
		echo json_encode($data);
	}

	function cart()
	{
		$tgl 		= $this->input->post("exp");
		$exp 		= date("Y-m-d", strtotime($tgl));
		$data 		= array(
			'id' 			=> $this->input->post('barang'),
			'name' 			=> $this->input->post("nama_produk"),
			'qty'			=> $this->input->post("qty"),
			'price'			=> $this->input->post("harga"),
			'kategori'		=> $this->input->post("kategori"),
			'jenis'			=> $this->input->post("jenis"),
			'satuan'		=> $this->input->post("satuan"),
			'exp'			=> $exp
		);

		$this->cart->insert($data);
		echo  $this->show_cart();
	}

	function show_cart()
	{
		$output = '';
		foreach ($this->cart->contents() as $key) {
			$output	.= '<tr>
	                          <td>' . $key['id'] . '</td>
	                          <td>' . $key['name'] . '</td>
	                          <td>' . $key['kategori'] . '</td>
	                          <td>' . $key['jenis'] . '</td>
	                          <td>' . $key['satuan'] . '</td>
	                          <td>' . number_format($key['price']) . '</td>
	                          <td>' . $key['exp'] . '</td>
	                          <td>' . $key['qty'] . '</td>
	                          <td>' . number_format($key['subtotal']) . '</td>
	                          <td>
	                            <div class="form-group">
	                              <div class="form-group">
	                                   <button type="button" class="btn btn-primary btn-sm glyphicon glyphicon-pencil" data-toggle="modal" data-target=".edit_obat' . $key['rowid'] . '"></button>


	                                   <button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-remove " id="remove_cart" data-id="' . $key['rowid'] . '"></button>
	                            </div>
	                          </td>
	                        </tr>';
		}
		$output .= '
				<tr>
					<th colspan="9">Total Harga</th>
					<th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
				</tr>
			';
		return $output;
	}

	function load_cart()
	{
		echo $this->show_cart();
	}

	function updatekeranjang()
	{
		$rowid 	= $this->input->post('rowid');
		$qty 	= $this->input->post('qty');
		$exp 	= $this->input->post('exp');
		$data 	= array(
			'rowid'	=> $rowid,
			'qty'	=> $qty,
			'exp'	=> $exp
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	function hapus_cart()
	{
		$rowid	= $this->input->post('row_id');

		$data 	= array(
			'rowid' 	=> $rowid,
			'qty'		=> 0
		);
		$this->cart->update($data);
		echo $this->show_cart();
	}

	function add()
	{
		$id_pemesanan 	= $this->input->post("id_pemesanan");
		// $id_user		= $this->session->userdata("id_user");
		$id_customers 	= $this->input->post("id_customers");
		$tgl 			= $this->input->post("tanggal");
		$tanggal 		= date("Y-m-d", strtotime($tgl));
		$total_harga	= $this->cart->total();

		$data 			= array(
			'id_pemesanan' 		=> $id_pemesanan,
			// 'id_user'			=> $id_user,
			'id_customers'		=> $id_customers,
			'tanggal' 			=> $tanggal,
			'total_harga' 		=> $total_harga
		);
		$this->Pemesananbarang_model->add($data);
		if ($this->cart->contents()) {
			if ($this->Pemesananbarang_model->get_id()) {
				foreach ($this->cart->contents() as $key) {

					$id_barang = $key['id'];
					$exp = $key['exp'];
					$count = $this->Pemesananbarang_model->count($id_barang, $exp);
					// echo $count[0]['jml'];
					$data_detail_pemesanan 	= array(
						'id_barang'			=> $key['id'],
						'id_pemesanan'		=> $id_pemesanan,
						'qty'				=> $key['qty'],
						'exp'				=> $key['exp'],
						'harga'				=> $key['price'],
						'subtotal'			=> $key['subtotal']
					);
					$this->Pemesananbarang_model->add_detail_pemesanan($data_detail_pemesanan);
					foreach ($count as $con) {
						if ($con['jml'] > 0) {
							$where = array('id_barang' => $key['id'], 'exp'	=> $key['exp']);
							foreach ($this->Pemesananbarang_model->get_id_where($where) as $w) {
								$stock 	= $w->stock + $key['qty'];

								$data_detail 	= array(
									'id_barang'			=> $key['id'],
									'exp'				=> $key['exp'],
									'stock'				=> $stock,
								);

								echo "<pre>";
								print_r($data_detail);
								echo $stock . '' . 'a';
								echo "</pre>";

								$where = array('id_barang' => $key['id'], 'exp'	=> $key['exp']);
								$this->Pemesananbarang_model->update_detail($data_detail, $where);
							}
						} else {
							$data_detail 	= array(
								'id_barang'			=> $key['id'],
								'exp'				=> $key['exp'],
								'stock'				=> $key['qty']
							);
							$this->Pemesananbarang_model->add_detail($data_detail);
						}
					}
				}
				$this->cart->destroy();
				redirect("pemesanan_barang");
			} else {
				foreach ($this->cart->contents() as $key) {
					# code...
					$where = array('id_barang' => $key['id']);
					$data_detail_pemesanan 	= array(
						'id_barang'			=> $key['id'],
						'id_pemesanan'		=> $id_pemesanan,
						'qty'				=> $key['qty'],
						'exp'				=> $key['exp'],
						'harga'				=> $key['price'],
						'subtotal'			=> $key['subtotal']
					);
					$this->Pemesananbarang_model->add_detail_pembelian($data_detail_pemesanan);
					$data_detail 	= array(
						'id_barang'		=> $key['id'],
						'exp'			=> $key['exp'],
						'stock'	=> $key['qty'],
					);
					$this->Pemesananbarang_model->add_detail($data_detail);
				}
				$this->cart->destroy();
				redirect("pemesanan_barang");
			}
		}
	}

	function data_customers()
	{
		$id_customers = $this->input->post("id_customers");

		$data = $this->Pemesananbarang_model->data_customers($id_customers);
		echo json_encode($data);
	}

	
}
