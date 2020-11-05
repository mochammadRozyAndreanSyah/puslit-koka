<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesananbarang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_barang()
    {
        return $this->db->get("barang")->result();
    }

    function get_data($id_barang)
    {
        $query = $this->db->get_where('barang', array('id_barang'   => $id_barang))->result();

        foreach ($query as $barang) {
            # code...
            $data = array(
                'id_barang'     => $barang->id_barang,
                'nama_produk'   => $barang->nama_produk,
                'jenis'         => $barang->jenis,
                'kategori'      => $barang->kategori,
                'satuan'        => $barang->satuan,
                'harga'         => $barang->harga
            );
        }
        return $data;
    }

    function add($data)
    {
        $this->db->insert("pemesanan", $data);
    }

    function add_detail_pemesanan($data_detail_pemesanan)
    {
        $this->db->insert("detail_pemesanan", $data_detail_pemesanan);
    }

    function pemesanan_data()
    {
        return $this->db->get("pemesanan")->result();
    }

    function pemesanan_detail()
    {
        $this->db->from("detail_pemesanan");
        $this->db->join("barang", "barang.id_barang = detail_pemesanan.id_barang", "LEFT");
        return $this->db->get()->result();
    }

    function get_customers()
    {
        return $this->db->get("customers")->result();
    }

    function data_customers($id_customers)
    {
        $query =  $this->db->get_where("customers", array('id_customers' => $id_customers))->result();
        foreach ($query as $key) {
            # code...
            $data = array(
                'id_customers'      => $key->id_customers,
                'nama_customers'    => $key->nama_customers,
                'nama_perusahaan'   => $key->nama_perusahaan,
                'alamat'            => $key->alamat,
                'no_telp'           => $key->no_telp,
                'alamat_perusahaan' => $key->alamat_perusahaan
            );
        }
        return $data;
    }

    function count($id_barang, $exp)
    {
        return $this->db->query("SELECT COUNT('stock') FROM barang WHERE id_barang = '$id_barang' AND exp = '$exp'")->result_array();
    }

    function get_id()
    {
        return $this->db->get('barang')->result();
    }

    function get_id_where($where)
    {
        $this->db->where($where);
        return $this->db->get('barang')->result();
    }

    function update_detail($data_detail, $where)
    {
        $this->db->where($where);
        $this->db->update('barang', $data_detail);
    }

    function add_detail($data_detail)
    {
        $this->db->insert('barang', $data_detail);
    }
  
}
