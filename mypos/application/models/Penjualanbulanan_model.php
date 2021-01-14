<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penjualanbulanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_laporan()
	{
		return $this->db->get("pembayaran")->result();
    }
    function getTransaksiMonth($year, $month)
	{
		$this->db->where('YEAR(tanggal_pembayaran)', $year);
		$this->db->where('MONTH(tanggal_pembayaran)', $month);
		return $this->db->get('pembayaran')->result();
	}
	function getYear()
	{
		return $this->db->query("Select DISTINCT YEAR(tanggal_pembayaran) as year From pembayaran ORDER BY year ASC")->result();
	}
}