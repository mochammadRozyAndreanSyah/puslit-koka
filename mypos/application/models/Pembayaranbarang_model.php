<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaranbarang_model extends CI_Model
{
//    function get_data()
//    {
//         $this->db->from("pemesanan");
//         $this->db->join("customers", "customers.id_customers = pemesanan.id_customers", "LEFT");
//         return $this->db->get()->result();
//    }
function get_pemesanan()
    {
        return $this->db->get("pemesanan")->result();
    }

//    function data_pemesan($id_pemesanan)
//     {
//         $data= $this->db->row("pemesanan", array('id_pemesanan' => $id_pemesanan))->row();
        
    
//         echo json_encode($data);
//     }

function data_pemesanan($id_pemesanan)
{
    $query =  $this->db->get_where("pemesanan", array('id_pemesanan' => $id_pemesanan))->result();
    foreach ($query as $key) {
        # code...
        $data = array(
            'id_pemesanan'      => $key->id_pemesanan,
            'id_customers'      => $key->id_customers,
            'tanggal'           => $key->tanggal,
            'total_harga'       => $key->total_harga
        );
    }
    return $data;
}

    function add($data)
	{
		return $this->db->insert("pembayaran", $data);
	}
    
    function insert ($table = '', $data = '')
    {
        $this->db->insert($table,$data);
    }
}