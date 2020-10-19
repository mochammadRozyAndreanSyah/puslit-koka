<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Databarang_model extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
	}

	function id_barang()
	{
		$this->db->select('MAX(RIGHT(barang.id_barang,4)) AS id_barang', FALSE);
		$this->db->order_by('id_barang', 'Desc');
		$this->db->limit(1);
		$query = $this->db->get('barang');

		if ($query->num_rows() <> 0) {
			# code...
			$data = $query->row();
			$id = intVal($data->id_barang) + 1;
		} else {
			$id = 1;
		}
		$batas = str_pad($id, 4, "0", STR_PAD_LEFT);
		$id_barang_tampil = "KK" . $batas;
		return $id_barang_tampil;
	}

	public function ambil_data()
	{
		return $this->db->get('barang')->result();
	}

	function tambahdata($data)
	{
		return $this->db->insert("barang", $data);
	}

	function editdata($data, $id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		return $this->db->update('barang', $data);
	}

	function hapusdata($id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		return $this->db->delete("barang");
	}

	function data($id_barang)
	{
		$this->db->select("barang.id_barang, barang.nama_produk , barang.jenis , barang.kategori , barang.satuan , barang.harga , barang.exp , barang.stock ");
		$this->db->from("barang");
		$this->db->where('barang.id_barang', $id_barang);
		// $this->db->join("detail_barang", "detail_barang.id_barang = barang.id_barang", "left");
		$query =  $this->db->get()->result();

		foreach ($query as $barang) {
			# code...
			$data = array(
				'id_barang' 		=> $barang->id_barang,
				'nama_produk' 		=> $barang->nama_produk,
				'jenis'				=> $barang->jenis,
				'kategori'			=> $barang->kategori,
				'satuan' 			=> $barang->satuan,
				'harga'				=> $barang->harga,
				'exp'				=> $exp,
				'stock'				=> $stock
			);
		}
		return $data;
	}

	function get_exp($id_barang)
	{
		$this->db->order_by("exp", "ASC");
		$query = $this->db->get_where('detail_barang', array('id_barang' => $id_barang));
		return $query;
	}

	function get_stock($id_barang, $exp)
	{
		$query = $this->db->get_where('detail_barang', array('id_barang' => $id_barang, 'exp' => $exp))->result();

		foreach ($query as $key) {
			# code...
			$data = array(
				'stock' => $key->stock
			);
		}
		return $data;
	}
}
