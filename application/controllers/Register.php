<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    protected $access = array('1', '2');
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengguna');
    }


    public function index()
    {
        $title = array(
            'title' => 'jogjaCam Pusatnya Aksesoris Kamera'
        );


        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/register_view');
    }

    function register_pengguna()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password2 = $this->input->post('password2');
        $level = '3';
        if ($password2 <> $password) {
            echo $this->session->set_flashdata('msg', 'passwordtidaksama');
            redirect('register');
        } else {
            $this->m_pengguna->simpan_pengguna($nama, $username, $password, $level);
            echo $this->session->set_flashdata('msg', 'tambahpengguna');
            redirect('register');
        }
    }
}
