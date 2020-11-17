<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Datapemesanan_Model extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
    }

    function pemesanan_data()
    {
        return $this->db->get("pemesanan")->result();
    }

    function pemesanan_detail($id)
    {   
        return $this->db->query("SELECT 
            barang.nama_produk, barang.jenis, barang.kategori, barang.satuan, detail_pemesanan.* 
                FROM  barang, detail_pemesanan
                 WHERE barang.id_barang = detail_pemesanan.id_barang
                    AND detail_pemesanan.id_pemesanan = '$id'")->result();
    }
    function get_where_trans($table = null, $data = null)
    {
        $this->db->from($table);

        $this->db->where($data);

        return $this->db->get();
    }
    function get_detail_trans($data = null, $table = null)
    {
        $this->db->from($table);
        $this->db->join('barang', 'barang.id_barang = detail_pemesanan.id_barang');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan');

        $this->db->where($data);

        return $this->db->get();
    }

}