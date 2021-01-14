<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Datapembayaran_Model extends CI_Model
{

	function __construct()
	{
		# code...
		parent::__construct();
    }

    function pembayaran_data()
    {
        return $this->db->get("pembayaran")->result();
    }

    function edit($data, $id_pembayaran)
	{
        $this->db->where('id_pembayaran', $id_pembayaran);
        $post = $this->input->post();

        if (!empty($_FILES["term_2"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}
		return $this->db->update('pembayaran', $data);
    }
    private function _uploadImage()
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

    // function pemesanan_detail() {
    //     $this->db->from("detail_pemesanan");
    //     $this->db->join("barang", "barang.id_barang = detail_pemesanan.id_barang", "LEFT");
    //     return $this->db->get()->result();
    // }

    function pembayaran_new($id)
    {   
        return $this->db->query("SELECT 
         pembayaran.id_pembayaran, pembayaran.tanggal_pembayaran, pembayaran.potongan, pembayaran.total_tagihan, pembayaran.status 
            FROM  pembayaran
             WHERE pembayaran.id_pembayaran ='$id'")->result();
    }
    function get_where_trans($table = null, $data = null)
    {
        $this->db->from($table);

        $this->db->where($data);

        return $this->db->get();
    }
    // function get_detail_trans($data = null, $table = null)
    // {
    //     $this->db->from($table);
    //     $this->db->join('barang', 'barang.id_barang = detail_pemesanan.id_barang');
    //     $this->db->join('pemesanan', 'pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan');

    //     $this->db->where($data);

    //     return $this->db->get();
    // }

}