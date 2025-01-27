<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
    protected $access = array('1', '2', '3');
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_kategori');
        $this->load->model('m_barang');
        $this->load->library('datatables');
    }


    public function index()
    {
        $title = array(
            'title' => 'EKA Toko - Ponjong'
        );
        $data = array(
            'data' =>    $this->m_barang->tampil_promo()
        );

        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/home_view', $data);
    }


    function overview()
    {
        $title = array(
            'title' => 'EKA Toko - Ponjong'
        );
        $data = array(
            'data' =>    $this->m_barang->tampil_overview()
        );

        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/overview_view', $data);
    }

    function makanan()
    {
        $title = array(
            'title' => 'EKA Toko - Ponjong'
        );
        $data = array(
            'data' =>    $this->m_barang->tampil_makanan()
        );

        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/makanan_view', $data);
    }

    function minuman()
    {
        $title = array(
            'title' => 'EKA Toko - Ponjong'
        );
        $data = array(
            'data' =>    $this->m_barang->tampil_minuman()
        );

        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/minuman_view', $data);
    }
}
