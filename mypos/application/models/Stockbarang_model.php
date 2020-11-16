<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Stockbarang_Model extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
	}

	
	function stock()
	{
		return $this->db->query("SELECT op.id_barang, op.nama_produk, op.kategori, op.jenis , op.exp, op.stock FROM barang AS op WHERE op.id_barang = op.id_barang")->result();
	}

	function get_barang_where($id_barang)
	{
		$this->db->select("barang.id_barang, barang.nama_produk, barang.kategori , barang.jenis , barang.exp, barang.stock");
		$this->db->from("barang");

		// $this->db->join("detail_barang", "detail_barang.id_barang = barang.id_barang", "left");
		$this->db->where("barang.id_barang", $id_barang);
		$query =  $this->db->get()->result();
		foreach ($query as $key) {
			$data = array(
				'id_barang' 	=> $key->id_barang,
				'nama_produk' 	=> $key->nama_produk,
                'kategori   ' 	=> $key->kategori,
                'jenis'         => $key->jenis,
				'exp' 			=> $key->exp,
				'stock'	        => $key->stock
			);
			# code...
		}
		return $data;
	}

	function get_barang()
	{
		return $this->db->get("barang")->result();
	}

	function get_det_barang()
	{
		$this->db->select("*");
		$this->db->from("detail_barang");
		$this->db->join("barang", "barang.id_barang = detail_barang.id_barang");
		$query = $this->db->get()->result();
		return $query;
	}

	function exp_barang_where($id_barang)
	{
		$this->db->where("id_barang", $id_barang);
		return $this->db->get("detail_barang")->result();
	}

	function stock_barang_where($where)
	{
		$this->db->where($where);
		$query = $this->db->get("detail_barang")->result();
		foreach ($query as $key) {
			$data = array(
				// 'id_obat' 		=> $key->id_obat,
				// 'exp' 			=> $key->exp,
				'stock'	=> $key->stock
			);
			# code...
		}
		return $data;
	}
}
