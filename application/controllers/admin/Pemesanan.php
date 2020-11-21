<?php
class Pemesanan extends CI_Controller
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
                'title' => 'Halaman Pemesanan',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_pemesanan', $data);
        } elseif ($this->session->userdata('user_level') == '3') {
            $data['data'] = $this->m_pemesanan->get_pelanggan_invoice();

            $title = array(
                'title' => 'Halaman Pemesanan',
            );
            $this->load->view('shared/header', $title);
            $this->load->view('admin/v_pemesanan', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function detail()
    {
        $id = $this->input->post('invoice_id');
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
            echo $this->session->set_flashdata('msg', 'konfirmasi');
            redirect('pemesanan');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    function konfirmasi()
    {
        if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2' || $this->session->userdata('user_level') == '3') {
            $id = $this->input->post('invoice_id');

            //Konfigurasi upload gambar
            $config['upload_path'] = './assets/upload/images/konfirmasi'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa di sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if (!empty($_FILES['filefoto']['name'])) {
                if ($this->upload->do_upload('filefoto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/upload/images/konfirmasi/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '90%';
                    $config['width'] = 500;
                    $config['height'] = 500;
                    $config['new_image'] = './assets/upload/images/konfirmasi/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];
                    $this->m_pemesanan->update_invoice($id, $gambar);
                    echo $this->session->set_flashdata('msg', 'uploadkonfirmasi');
                    redirect('pemesanan');
                } else {
                    echo $this->session->set_flashdata('msg', 'error-img');
                    redirect('pemesanan');
                }
            }
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
}
