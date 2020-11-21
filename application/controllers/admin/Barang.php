<?php
class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->library('upload');
		$this->load->helper('text');
	}
	function index()
	{

		if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {

			$data = array(
				'data' =>	$this->m_barang->tampil_barang(),
				'kat' =>	$this->m_kategori->tampil_kategori(),
				'kat2' =>	$this->m_kategori->tampil_kategori()
			);
			$title = array(
				'title' => 'Halaman Barang',
			);
			$this->load->view('shared/header', $title);
			$this->load->view('admin/v_barang', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function tambah_barang()
	{
		if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
			$kobar = $this->m_barang->get_kobar();
			$nabar = $this->input->post('nabar');
			$desc = htmlspecialchars($this->input->post('deskripsi'), ENT_QUOTES);
			$kat = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$harpok = str_replace(',', '', $this->input->post('harpok'));
			$harjul = str_replace(',', '', $this->input->post('harjul'));
			$harjul_grosir = str_replace(',', '', $this->input->post('harjul_grosir'));
			$stok = $this->input->post('stok');
			$min_stok = $this->input->post('min_stok');


			//Konfigurasi upload gambar
			$config['upload_path'] = './assets/upload/images/barang'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			$this->upload->initialize($config);
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/upload/images/barang/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['quality'] = '90%';
					$config['width'] = 500;
					$config['height'] = 500;
					$config['new_image'] = './assets/upload/images/barang/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar = $gbr['file_name'];
					$this->m_barang->simpan_barang($kobar, $gambar, $nabar, $desc, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);
					echo $this->session->set_flashdata('msg', 'tambahbrg');
					redirect('barang');
				} else {
					echo $this->session->set_flashdata('msg', 'error-img');
					redirect('barang');
				}
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function edit_barang()
	{
		if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
			$kobar = $this->input->post('kobar');
			$nabar = $this->input->post('nabar');
			$desc = htmlspecialchars($this->input->post('deskripsi'), ENT_QUOTES);
			$kat = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$harpok = str_replace(',', '', $this->input->post('harpok'));
			$harjul = str_replace(',', '', $this->input->post('harjul'));
			$harjul_grosir = str_replace(',', '', $this->input->post('harjul_grosir'));
			$stok = $this->input->post('stok');
			$min_stok = $this->input->post('min_stok');

			//Konfigurasi upload gambar
			$config['upload_path'] = './assets/upload/images/barang'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			$this->upload->initialize($config);
			if (!empty($_FILES['filefoto']['name'])) {
				if ($this->upload->do_upload('filefoto')) {
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/upload/images/barang/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['quality'] = '90%';
					$config['width'] = 500;
					$config['height'] = 500;
					$config['new_image'] = './assets/upload/images/barang/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar = $gbr['file_name'];
					$this->m_barang->update_barang($kobar, $gambar, $nabar, $desc, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);
					echo $this->session->set_flashdata('msg', 'editbrg');
					redirect('barang');
				} else {
					echo $this->session->set_flashdata('msg', 'error-img');
					redirect('barang');
				}
			} else {
				$this->m_barang->update_barang_noimg($kobar, $nabar, $desc, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);
				echo $this->session->set_flashdata('msg', 'editbrg');
				redirect('barang');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function hapus_barang()
	{
		if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
			$kode = $this->input->post('kode');
			$this->m_barang->hapus_barang($kode);
			echo $this->session->set_flashdata('msg', 'hapusbrg');
			redirect('barang');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
}
