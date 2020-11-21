<?php
class Suplier extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_suplier');
	}
	function index(){
	if($this->session->userdata('user_level')=='1'){
		$data['data']=$this->m_suplier->tampil_suplier();
		$title = array(
      'title' => 'Halaman Suplier' ,
	    );
		$this->load->view('nav/header',$title);
		$this->load->view('admin/v_suplier',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_suplier(){
	if($this->session->userdata('user_level')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->simpan_suplier($nama,$alamat,$notelp);
		echo $this->session->set_flashdata('msg','tambahsuplier');
		redirect('admin/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_suplier(){
	if($this->session->userdata('user_level')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_suplier->update_suplier($kode,$nama,$alamat,$notelp);
		echo $this->session->set_flashdata('msg','editsuplier');
		redirect('admin/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_suplier(){
	if($this->session->userdata('user_level')=='1'){
		$kode=$this->input->post('kode');
		$this->m_suplier->hapus_suplier($kode);
		echo $this->session->set_flashdata('msg','hapussuplier');
		redirect('admin/suplier');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
