<?php
class Bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_bank');
    }
    function index()
    {
        if ($this->session->userdata('user_level') == '1') {
            $data['data'] = $this->m_bank->get_all_bank();
            $title = array(
                'title' => 'Halaman Bank',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_bank', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function tambah_bank()
    {
        if ($this->session->userdata('user_level') == '1') {
            $nama = $this->input->post('bank_nama');
            $rek = $this->input->post('bank_rek');
            $owner = $this->input->post('bank_owner');
            $this->m_bank->simpan_bank($nama, $rek, $owner);
            echo $this->session->set_flashdata('msg', 'tambahbank');
            redirect('bank');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function edit_bank()
    {
        if ($this->session->userdata('user_level') == '1') {
            $id = $this->input->post('bank_id');
            $nama = $this->input->post('bank_nama');
            $rek = $this->input->post('bank_rek');
            $owner = $this->input->post('bank_owner');
            $this->m_bank->update_bank($id, $nama, $rek, $owner);
            echo $this->session->set_flashdata('msg', 'editbank');
            redirect('bank');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function hapus_bank()
    {
        if ($this->session->userdata('user_level') == '1') {
            $id = $this->input->post('bank_id');
            $this->m_bank->hapus_bank($id);
            echo $this->session->set_flashdata('msg', 'hapusbank');
            redirect('bank');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
