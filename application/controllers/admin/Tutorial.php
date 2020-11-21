<?php
class Tutorial extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_tutorial');
        $this->load->library('upload');
        $this->load->helper('text');
    }
    function index()
    {
        if ($this->session->userdata('user_level') == '1') {
            $data['data'] = $this->m_tutorial->tampil_tutorial();
            $title = array(
                'title' => 'Halaman Tutorial',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_tutorial', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function tambah_tutorial()
    {
        if ($this->session->userdata('user_level') == '1') {
            $tut = $this->input->post('judul');
            $desc = $this->input->post('deskripsi');
            //Konfigurasi upload gambar
            $config['upload_path'] = './assets/upload/tutorial'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/tutorial/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = 100;
                    $config['height'] = 100;
                    $config['new_image'] = './assets/upload/tutorial/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->m_tutorial->simpan_tutorial($tut, $desc, $gambar);
                    echo $this->session->set_flashdata('msg', 'tambahtutorial');
                    redirect('daftartutorial');
                } else {
                    echo $this->session->set_flashdata('msg', 'error-img');
                    redirect('daftartutorial');
                }
            }
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function edit_tutorial()
    {
        if ($this->session->userdata('user_level') == '1') {
            $kode = $this->input->post('kode');
            $tut = $this->input->post('judul');
            $desc = $this->input->post('deskripsi');
            //Konfigurasi upload gambar
            $config['upload_path'] = './assets/upload/tutorial'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/tutorial/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = 100;
                    $config['height'] = 100;
                    $config['new_image'] = './assets/upload/tutorial/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->m_tutorial->update_tutorial($kode, $tut, $desc, $gambar);
                    echo $this->session->set_flashdata('msg', 'edittutorial');
                    redirect('daftartutorial');
                } else {
                    echo $this->session->set_flashdata('msg', 'error-img');
                    redirect('daftartutorial');
                }
            } else {
                $this->m_tutorial->update_tutorial_noimg($kode, $tut, $desc);
                echo $this->session->set_flashdata('msg', 'edittutorial');
                redirect('daftartutorial');
            }
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function hapus_tutorial()
    {
        if ($this->session->userdata('user_level') == '1') {
            $kode = $this->input->post('kode');
            $this->m_tutorial->hapus_tutorial($kode);
            echo $this->session->set_flashdata('msg', 'hapustutorial');
            redirect('daftartutorial');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
