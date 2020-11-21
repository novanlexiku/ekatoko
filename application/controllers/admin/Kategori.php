<?php
class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->model('m_kategori');
	}
	function index()
	{
		if ($this->session->userdata('user_level') == '1') {
			$data['data'] = $this->m_kategori->tampil_kategori();
			$title = array(
				'title' => 'Halaman Kategori',
			);
			$this->load->view('shared/header', $title);
			$this->load->view('admin/v_kategori', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function tambah_kategori()
	{
		if ($this->session->userdata('user_level') == '1') {
			$kat = $this->input->post('kategori');
			$this->m_kategori->simpan_kategori($kat);
			echo $this->session->set_flashdata('msg', 'tambahkategori');
			redirect('kategori');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function edit_kategori()
	{
		if ($this->session->userdata('user_level') == '1') {
			$kode = $this->input->post('kode');
			$kat = $this->input->post('kategori');
			$this->m_kategori->update_kategori($kode, $kat);
			echo $this->session->set_flashdata('msg', 'editkategori');
			redirect('kategori');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function hapus_kategori()
	{
		if ($this->session->userdata('user_level') == '1') {
			$kode = $this->input->post('kode');
			$this->m_kategori->hapus_kategori($kode);
			echo $this->session->set_flashdata('msg', 'hapuskategori');
			redirect('kategori');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
}
