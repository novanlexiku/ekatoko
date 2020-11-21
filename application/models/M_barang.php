<?php
class M_barang extends CI_Model
{

	function hapus_barang($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar, $gambar, $nabar, $desc, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok)
	{
		$user_id = $this->session->userdata('user_id');
		$hsl = $this->db->query("UPDATE tbl_barang SET barang_nama='$nabar', barang_deskripsi='$desc', barang_gambar='$gambar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}
	function update_barang_noimg($kobar, $nabar, $desc, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok)
	{
		$user_id = $this->session->userdata('user_id');
		$hsl = $this->db->query("UPDATE tbl_barang SET barang_nama='$nabar', barang_deskripsi='$desc', barang_satuan='$satuan', barang_harpok='$harpok', barang_harjul='$harjul', barang_harjul_grosir='$harjul_grosir', barang_stok='$stok', barang_min_stok='$min_stok', barang_tgl_last_update=NOW(), barang_kategori_id='$kat', barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang()
	{
		$hsl = $this->db->query("SELECT barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_promo, barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		return $hsl;
	}



	function simpan_barang($kobar, $gambar, $nabar, $desc, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok)
	{
		$user_id = $this->session->userdata('user_id');
		$hsl = $this->db->query("INSERT INTO tbl_barang (barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$gambar','$nabar','$desc','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}

	function get_barang($kobar)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;
	}

	function get_kobar()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->kd_max) + 1;
				$kd = sprintf("%06s", $tmp);
			}
		} else {
			$kd = "000001";
		}
		return "BR" . $kd;
	}

	function update_status($kode)
	{
		$hsl = $this->db->query("UPDATE tbl_barang SET barang_promo='0' WHERE barang_id='$kode'");
		return $hsl;
	}
	function update_status2($kode)
	{
		$hsl = $this->db->query("UPDATE tbl_barang SET barang_promo='1' WHERE barang_id='$kode'");
		return $hsl;
	}

	function tampil_promobe()
	{
		$hsl = $this->db->query("SELECT barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_promo, barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id ORDER BY barang_promo desc");
		return $hsl;
	}

	function tampil_promo()
	{
		$hsl = $this->db->query("SELECT barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_promo, barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id WHERE barang_promo=1");
		return $hsl;
	}
	function tampil_aksesoris()
	{
		$hsl = $this->db->query("SELECT barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_promo, barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id WHERE barang_kategori_id=1");
		return $hsl;
	}
	function tampil_kamera()
	{
		$hsl = $this->db->query("SELECT barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_promo, barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id WHERE barang_kategori_id=2");
		return $hsl;
	}

	function tampil_overview()
	{
		$hsl = $this->db->query("SELECT barang_id,barang_gambar,barang_nama,barang_deskripsi,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_promo, barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		return $hsl;
	}
}
