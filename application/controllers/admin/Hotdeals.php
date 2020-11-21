<?php
class Hotdeals extends CI_Controller
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
                'data' =>    $this->m_barang->tampil_promobe(),
                'kat' =>    $this->m_kategori->tampil_kategori(),
                'kat2' =>    $this->m_kategori->tampil_kategori()
            );
            $title = array(
                'title' => 'Halaman Hot Deals',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_barangbaru', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function nonaktifkan()
    {
        if ($this->session->userdata('user_level') == '1') {
            $kode = $this->input->post('kode');
            $this->m_barang->update_status($kode);
            echo $this->session->set_flashdata('msg', 'promodeactivated');
            redirect('promo');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function aktifkan()
    {
        if ($this->session->userdata('user_level') == '1') {
            $kode = $this->input->post('kode');
            $this->m_barang->update_status2($kode);
            echo $this->session->set_flashdata('msg', 'promoactivated');
            redirect('promo');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
