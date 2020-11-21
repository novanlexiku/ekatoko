<?php
class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_staff');
        $this->load->library('upload');
        $this->load->helper('text');
    }
    function index()
    {
        if ($this->session->userdata('user_level') == '1') {
            $data['data'] = $this->m_staff->tampil_staff();
            $title = array(
                'title' => 'Halaman Staff',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_staff', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function tambah_staff()
    {
        if ($this->session->userdata('user_level') == '1') {
            $tut = $this->input->post('nama');
            $desc = $this->input->post('deskripsi');
            //Konfigurasi upload gambar
            $config['upload_path'] = './assets/upload/staff'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/staff/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['width'] = 500;
                    $config['height'] = 500;
                    $config['new_image'] = './assets/upload/staff/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->m_staff->simpan_staff($tut, $desc, $gambar);
                    echo $this->session->set_flashdata('msg', 'tambahstaff');
                    redirect('daftarstaff');
                } else {
                    echo $this->session->set_flashdata('msg', 'error-img');
                    redirect('daftarstaff');
                }
            }
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function edit_staff()
    {
        if ($this->session->userdata('user_level') == '1') {
            $kode = $this->input->post('kode');
            $tut = $this->input->post('nama');
            $desc = $this->input->post('deskripsi');
            //Konfigurasi upload gambar
            $config['upload_path'] = './assets/upload/staff'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/staff/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['width'] = 500;
                    $config['height'] = 500;
                    $config['new_image'] = './assets/upload/staff/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->m_staff->update_staff($kode, $tut, $desc, $gambar);
                    echo $this->session->set_flashdata('msg', 'editstaff');
                    redirect('daftarstaff');
                } else {
                    echo $this->session->set_flashdata('msg', 'error-img');
                    redirect('daftarstaff');
                }
            } else {
                $this->m_staff->update_staff_noimg($kode, $tut, $desc);
                echo $this->session->set_flashdata('msg', 'editstaff');
                redirect('daftarstaff');
            }
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function hapus_staff()
    {
        if ($this->session->userdata('user_level') == '1') {
            $kode = $this->input->post('kode');
            $this->m_staff->hapus_staff($kode);
            echo $this->session->set_flashdata('msg', 'hapusstaff');
            redirect('daftarstaff');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
