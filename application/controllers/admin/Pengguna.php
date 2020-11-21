<?php
class Pengguna extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->model('m_pengguna');
	}
	function index()
	{
		if ($this->session->userdata('user_level') == '1') {
			$data['data'] = $this->m_pengguna->get_pengguna();
			$title = array(
				'title' => 'Halaman Daftar Pengguna',
			);
			$this->load->view('shared/header', $title);
			$this->load->view('admin/v_pengguna', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	function tambah_pengguna()
	{
		if ($this->session->userdata('user_level') == '1') {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');
			$level = $this->input->post('level');
			if ($password2 <> $password) {
				echo $this->session->set_flashdata('msg', 'passwordtidaksama');
				redirect('pengguna');
			} else {
				$this->m_pengguna->simpan_pengguna($nama, $username, $password, $level);
				echo $this->session->set_flashdata('msg', 'tambahpengguna');
				redirect('pengguna');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function edit_pengguna()
	{
		if ($this->session->userdata('user_level') == '1') {
			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');
			$level = $this->input->post('level');
			if (empty($password) && empty($password2)) {
				$this->m_pengguna->update_pengguna_nopass($kode, $nama, $username, $level);
				echo $this->session->set_flashdata('msg', 'updatepengguna');
				redirect('pengguna');
			} elseif ($password2 <> $password) {
				echo $this->session->set_flashdata('msg', 'passwordtidaksama');
				redirect('pengguna');
			} else {
				$this->m_pengguna->update_pengguna($kode, $nama, $username, $password, $level);
				echo $this->session->set_flashdata('msg', 'updatepengguna');
				redirect('pengguna');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function nonaktifkan()
	{
		if ($this->session->userdata('user_level') == '1') {
			$kode = $this->input->post('kode');
			$this->m_pengguna->update_status($kode);
			echo $this->session->set_flashdata('msg', 'penggunadeactivated');
			redirect('pengguna');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function aktifkan()
	{
		if ($this->session->userdata('user_level') == '1') {
			$kode = $this->input->post('kode');
			$this->m_pengguna->update_status2($kode);
			echo $this->session->set_flashdata('msg', 'penggunaactivated');
			redirect('pengguna');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
}
