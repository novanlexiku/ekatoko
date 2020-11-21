<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Login extends MY_Controller
{

    public function logged_in_check()
    {
        if ($this->session->userdata("logged_in")) {
            if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
                redirect('dashboard');
            } else {
                redirect('home');
            }
        }
    }

    public function index()
    {
        $this->logged_in_check();

        $this->load->library('form_validation');
        $this->form_validation->set_rules("user_username", "Username", "trim|required");
        $this->form_validation->set_rules("user_password", "Password", "trim|required");
        if ($this->form_validation->run() == true) {
            $this->load->model('Auth_model', 'auth');
            // check the username & password of user
            $status = $this->auth->validate();
            if ($status == 'ERR_INVALID_USERNAME') {
                $this->session->set_flashdata('msg', 'usernamesalah');
                redirect('login', 'refresh');
            } elseif ($status == 'ERR_INVALID_PASSWORD') {
                $this->session->set_flashdata('msg', 'passwordsalah');
                redirect('login', 'refresh');
            } else {
                // success
                // store the user data to session
                $this->session->set_userdata($this->auth->get_data());
                $this->session->set_userdata("logged_in", true);
                // redirect to dashboard
                $this->session->set_flashdata('message', 'sukseslogin');
                if ($this->session->userdata('user_level') == '1' || $this->session->userdata('user_level') == '2') {
                    redirect('dashboard');
                } else {
                    redirect('home');
                }
            }
        }


        $title = array(
            'title' => 'jogjaCam Pusatnya Aksesoris Kamera'
        );


        $this->load->view('shared/frontheader', $title);
        $this->load->view('front/login_view');
    }


    public function logout()
    {
        $this->session->unset_userdata("logged_in");
        $this->session->sess_destroy();
        redirect("login");
    }

    public function forget()
    {
        $this->load->view('forget');
    }
}
