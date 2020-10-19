<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Datacustomers_model extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
	}

	function id_customers()
	{
		$this->db->select('MAX(RIGHT(customers.id_customers,4)) AS id_customers', FALSE);
		$this->db->order_by('id_customers', 'Desc');
		$this->db->limit(1);
		$query = $this->db->get('customers');

		if ($query->num_rows() <> 0) {
			# code...
			$data = $query->row();
			$id = intVal($data->id_customers) + 1;
		} else {
			$id = 1;
		}
		$batas = str_pad($id, 4, "0", STR_PAD_LEFT);
		$id_customers_tampil = "CS" . $batas;
		return $id_customers_tampil;
	}

	public function ambil_data()
	{
		return $this->db->get('customers')->result();
	}

	function tambahdata($data)
	{
		return $this->db->insert("customers", $data);
	}

	function editdata($data, $id_customers)
	{
		$this->db->where('id_customers', $id_customers);
		return $this->db->update('customers', $data);
	}

	function hapusdata($id_customers)
	{
		$this->db->where('id_customers', $id_customers);
		return $this->db->delete("customers");
	}

	function data($id_customers)
	{
		$this->db->select("customers.id_customers, customers.nama_customers , customers.nama_perusahaan , customers.alamat , customers.no_telp , customers.alamat_perusahaan ");
		$this->db->from("customers");
		$this->db->where('customers.id_customers', $id_customers);
		// $this->db->join("detail_barang", "detail_barang.id_barang = barang.id_barang", "left");
		$query =  $this->db->get()->result();

		foreach ($query as $barang) {
			# code...
			$data = array(
			'id_customers' 				=> $id_customers,
			'nama_customers'			=> $nama_customers,
			'nama_perusahaan'			=> $nama_perusahaan,
			'alamat'					=> $alamat,
			'no_telp'					=> $no_telp,
            'alamat_perusahaan'			=> $alamat_perusahaan
            
			);
		}
		return $data;
	}

	// function get_exp($id_barang)
	// {
	// 	$this->db->order_by("exp", "ASC");
	// 	$query = $this->db->get_where('detail_barang', array('id_barang' => $id_barang));
	// 	return $query;
	// }

	// function get_stock($id_barang, $exp)
	// {
	// 	$query = $this->db->get_where('detail_barang', array('id_barang' => $id_barang, 'exp' => $exp))->result();

	// 	foreach ($query as $key) {
	// 		# code...
	// 		$data = array(
	// 			'stock' => $key->stock
	// 		);
	// 	}
	// 	return $data;
	// }
}
