<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        if ($this->session->userdata('logged_in') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->library('datatables');
    }


    public function index()
    {
        if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2' || $this->session->userdata('user_level') == '3') {
            $title = array(
                'title' => 'Dashboard'
            );

            $this->load->view('shared/header', $title);
            $this->load->view('admin/dashboard_view');
        } else {
            redirect('login');
        }
    }
}
