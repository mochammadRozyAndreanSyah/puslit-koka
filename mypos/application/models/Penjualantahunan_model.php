<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	/**
	 *
	 */
	class Penjualantahunan_model extends CI_Model
	{

		function __construct()
	{
			# code...
			parent::__construct();
	}

		
	function get_laporan()
	{
		return $this->db->get("pembayaran")->result();
    }
    function getTransaksiYear($year)
	{
		$this->db->where('YEAR(tanggal_pembayaran)', $year);
		return $this->db->get('pembayaran')->result();
	}
	function getYear()
	{
		return $this->db->query("Select DISTINCT YEAR(tanggal_pembayaran) as year From pembayaran ORDER BY year ASC")->result();
	}
}
?>