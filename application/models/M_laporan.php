<?php
class M_laporan extends CI_Model
{
	function get_stok_barang()
	{
		$hsl = $this->db->query("SELECT kategori_id,kategori_nama,barang_nama,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	function get_data_barang()
	{
		$hsl = $this->db->query("SELECT kategori_id,barang_id,kategori_nama,barang_nama,barang_satuan,barang_harjul,barang_stok FROM tbl_kategori JOIN tbl_barang ON kategori_id=barang_kategori_id GROUP BY kategori_id,barang_nama");
		return $hsl;
	}
	function get_data_penjualan()
	{
		$hsl = $this->db->query("SELECT invoice_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal, invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status FROM tbl_invoice WHERE invoice_status = 'pengiriman' ORDER BY invoice_id DESC");
		return $hsl;
	}
	function get_total_penjualan()
	{
		$hsl = $this->db->query("SELECT invoice_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal, invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status,sum(invoice_total) as total FROM tbl_invoice WHERE invoice_status = 'pengiriman'");
		return $hsl;
	}
	function get_data_jual_pertanggal($tanggal)
	{
		$hsl = $this->db->query("SELECT invoice_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal,invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status FROM tbl_invoice WHERE invoice_status = 'pengiriman' and DATE(invoice_tanggal)='$tanggal' ORDER BY invoice_id DESC");
		return $hsl;
	}
	function get_data_total_jual_pertanggal($tanggal)
	{
		$hsl = $this->db->query("SELECT invoice_id,DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal,invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status,SUM(invoice_total) as total FROM tbl_invoice WHERE invoice_status = 'pengiriman' and DATE(invoice_tanggal)='$tanggal'");
		return $hsl;
	}
	function get_bulan_jual()
	{
		$hsl = $this->db->query("SELECT DISTINCT DATE_FORMAT(invoice_tanggal,'%M %Y') AS bulan FROM tbl_invoice where invoice_status='pengiriman'");
		return $hsl;
	}
	function get_tahun_jual()
	{
		$hsl = $this->db->query("SELECT DISTINCT YEAR(invoice_tanggal) AS tahun FROM tbl_invoice where invoice_status='pengiriman'");
		return $hsl;
	}
	function get_jual_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT invoice_id,DATE_FORMAT(invoice_tanggal,'%M %Y') AS bulan,DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal,invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status FROM tbl_invoice WHERE invoice_status='pengiriman' and DATE_FORMAT(invoice_tanggal,'%M %Y')='$bulan' ORDER BY invoice_id DESC");
		return $hsl;
	}
	function get_total_jual_perbulan($bulan)
	{
		$hsl = $this->db->query("SELECT invoice_id,DATE_FORMAT(invoice_tanggal,'%M %Y') AS bulan,DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal,invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status,SUM(invoice_total) as total FROM tbl_invoice WHERE invoice_status='pengiriman' and DATE_FORMAT(invoice_tanggal,'%M %Y')='$bulan' ORDER BY invoice_id DESC");
		return $hsl;
	}
	function get_jual_pertahun($tahun)
	{
		$hsl = $this->db->query("SELECT invoice_id,YEAR(invoice_tanggal) AS tahun,DATE_FORMAT(invoice_tanggal,'%M %Y') AS bulan,DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal,invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status FROM tbl_invoice WHERE invoice_status='pengiriman' and YEAR(invoice_tanggal)='$tahun' ORDER BY invoice_id DESC");
		return $hsl;
	}
	function get_total_jual_pertahun($tahun)
	{
		$hsl = $this->db->query("SELECT invoice_id,YEAR(invoice_tanggal) AS tahun,DATE_FORMAT(invoice_tanggal,'%M %Y') AS bulan,DATE_FORMAT(invoice_tanggal,'%d %M %Y') AS invoice_tanggal,invoice_user_id, invoice_user_nama, invoice_no_hp, invoice_tujuan, invoice_bank_id, invoice_total, invoice_status,SUM(invoice_total) as total FROM tbl_invoice WHERE invoice_status='pengiriman' and YEAR(invoice_tanggal)='$tahun' ORDER BY invoice_id DESC");
		return $hsl;
	}
	//=========Laporan Laba rugi============
	function get_lap_laba_rugi($bulan)
	{
		$hsl = $this->db->query("SELECT i.invoice_user_id, DATE_FORMAT(invoice_tanggal,'%d %M %Y') as invoice_tanggal, i.invoice_id, i.invoice_user_nama, i.invoice_no_hp, i.invoice_tujuan, i.invoice_bank_id, i.invoice_total, i.invoice_status,b.bi_invoice_id, b.bi_barang_nama, b.bi_barang_harjul, b.bi_barang_qty, c.barang_id, c.barang_gambar, c.barang_nama, c.barang_deskripsi, c.barang_satuan, c.barang_harpok, c.barang_harjul, c.barang_harjul_grosir, c.barang_stok, c.barang_min_stok, b.bi_barang_qty FROM tbl_invoice i, tbl_barang_invoice b, tbl_barang c WHERE i.invoice_id=b.bi_invoice_id and b.bi_barang_id=c.barang_id and i.invoice_status='pengiriman' and DATE_FORMAT(invoice_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}
	function get_total_lap_laba_rugi($bulan)
	{
		$hsl = $this->db->query("SELECT i.invoice_user_id, DATE_FORMAT(invoice_tanggal,'%M %Y') AS bulan,i.invoice_id, i.invoice_user_nama, i.invoice_no_hp, i.invoice_tujuan, i.invoice_bank_id, i.invoice_total, i.invoice_status,b.bi_invoice_id, b.bi_barang_nama, b.bi_barang_harjul, b.bi_barang_qty, c.barang_id, c.barang_gambar, c.barang_nama, c.barang_deskripsi, c.barang_satuan, c.barang_harpok, c.barang_harjul, c.barang_harjul_grosir, c.barang_stok, c.barang_min_stok, b.bi_barang_qty FROM tbl_invoice i, tbl_barang_invoice b, tbl_barang c WHERE i.invoice_id=b.bi_invoice_id and b.bi_barang_id=c.barang_id and i.invoice_status='pengiriman' and DATE_FORMAT(invoice_tanggal,'%M %Y')='$bulan'");
		return $hsl;
	}
}
