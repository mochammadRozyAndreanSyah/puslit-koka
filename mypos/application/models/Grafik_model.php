<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Grafik_model extends CI_Model
{

	function get_data_penjualan()
	{
		$query = $this->db->query("SELECT YEAR (tanggal_pembayaran) As tanggal,SUM(total_tagihan) AS total_penjualan FROM pembayaran GROUP BY YEAR (tanggal)");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function get_penjualan_barang()
	{
		$query = $this->db->query(" SELECT
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=2019))),0) AS `Januari`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=2019))),0) AS `Februari`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=2019))),0) AS `Maret`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=2019))),0) AS `April`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=2019))),0) AS `Mei`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=2019))),0) AS `Juni`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=2019))),0) AS `Juli`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=2019))),0) AS `Agustus`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=2019))),0) AS `September`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=2019))),0) AS `Oktober`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=2019))),0) AS `November`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=2019))),0) AS `Desember`
			from pemesanan GROUP BY YEAR(tanggal)");

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function get_data_penjualan_barang($tahun, $id_barang ='$id_barang')
	{
		$query = $this->db->query(" SELECT
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Januari`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Februari`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Maret`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `April`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Mei`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Juni`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Juli`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Agustus`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `September`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Oktober`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `November`,
			ifnull((SELECT SUM(qty) AS total_penjualan_barang FROM detail_pemesanan WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=$tahun) AND id_barang ='$id_barang')),0) AS `Desember`
			from pemesanan GROUP BY YEAR(tanggal)");

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function get_data_penjualan_perbulan($tahun)
	{
		//$query = $this->db->query("SELECT YEAR (tanggal),MONTH (tanggal) As tanggal,SUM(id_penjualan) AS total_penjualan FROM penjualan GROUP BY  MONTH (tanggal)");
		$query = $this->db->query("SELECT
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=1)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Januari`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=2)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Februari`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=3)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Maret`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=4)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `April`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=5)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Mei`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=6)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Juni`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=7)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Juli`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=8)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Agustus`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=9)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `September`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=10)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Oktober`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=11)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `November`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=12)AND (YEAR(tanggal_pembayaran)=$tahun))),0) AS `Desember`
			from pembayaran GROUP BY YEAR(tanggal_pembayaran) ");



		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}
	function data_penjualan_perbulan()
	{
		//$query = $this->db->query("SELECT YEAR (tanggal),MONTH (tanggal) As tanggal,SUM(id_penjualan) AS total_penjualan FROM penjualan GROUP BY  MONTH (tanggal)");
		$query = $this->db->query("SELECT
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=1)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Januari`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=2)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Februari`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=3)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Maret`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=4)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `April`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=5)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Mei`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=6)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Juni`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=7)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Juli`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=8)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Agustus`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=9)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `September`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=10)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Oktober`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=11)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `November`,
			ifnull((SELECT SUM(total_tagihan) AS total_penjualan FROM pembayaran WHERE((Month(tanggal_pembayaran)=12)AND (YEAR(tanggal_pembayaran)=2019))),0) AS `Desember`
			from pembayaran GROUP BY YEAR(tanggal_pembayaran) ");



		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $data) {
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function get_barang()
	{
		return $this->db->get('barang')->result();
	}
}
