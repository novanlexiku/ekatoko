<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed
 * for (all) non logged in users
 */
class Auth extends MY_Controller
{

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in")) {
			redirect('dashboard', 'refresh');
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
				$this->session->set_flashdata('message', 'usernamesalah');
				redirect('auth', 'refresh');
			} elseif ($status == 'ERR_INVALID_PASSWORD') {
				$this->session->set_flashdata('message', 'passwordsalah');
				redirect('auth', 'refresh');
			} else {
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata("logged_in", true);
				// redirect to dashboard
				$this->session->set_flashdata('message', 'sukseslogin');
				redirect('dashboard', 'refresh');
			}
		}


		$this->load->view("auth");
	}


	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("auth");
	}

	public function forget()
	{
		$this->load->view('forget');
	}
}
