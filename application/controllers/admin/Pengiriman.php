<?php
class Pengiriman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_pemesanan');
        $this->load->library('upload');
        $this->load->helper('text');
    }
    function index()
    {
        if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
            $data['data'] = $this->m_pemesanan->get_all_invoice();

            $title = array(
                'title' => 'Halaman Pengiriman',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_pengiriman', $data);
        } elseif ($this->session->userdata('user_level') == '3') {
            $data['data'] = $this->m_pemesanan->get_pelanggan_invoice();

            $title = array(
                'title' => 'Halaman Pengiriman',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_pengiriman', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function detail()
    {
        $id = $this->input->post('invoice_id');
        $data['data'] = $this->m_pemesanan->get_all_invoice();
        $data['detail'] = $this->m_pemesanan->get_admin_detail_invoice($id);

        $title = array(
            'title' => 'Halaman Detail',
        );
        $this->load->view('shared/header', $title);
        $this->load->view('admin/detail/v_detail_invoice', $data);
    }

    function update()
    {
        if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
            $id = $this->input->post('invoice_id');
            $sts = $this->input->post('invoice_status');
            $this->m_pemesanan->update($id, $sts);
            echo $this->session->set_flashdata('msg', 'pengiriman');
            redirect('pengiriman');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
