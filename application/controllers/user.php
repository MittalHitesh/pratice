<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Users_model');
	}
	
	/**
   * encript the password 
   * @return mixed
   */	
  function __encrip_password($password) {
    return md5($password);
  }	
		
	public function index()
	{
		$this->output->enable_profiler(TRUE);
		if($this->session->userdata('is_logged_in'))
		{	
			redirect('admin');
		} 
		else
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('project/template/login');
			}
			else
			{	
				$this->load->model('Users_model');
				$user_name = $this->input->post('username');
				$password = $this->__encrip_password($this->input->post('password'));

				$is_valid = $this->Users_model->validate_user_login($user_name, $password);
				
				if($is_valid)
				{
					$data = array(
						'username' => $user_name,
						'is_logged_in' => true
					);
					$this->session->set_userdata($data);
					redirect('admin');
				}
				else // incorrect username or password
				{
					$data['message_error'] = TRUE;
					$this->load->view('project/template/login');
				}
			}
		}		
	}
	
	/**
   * Destroy the session, and logout the user.
   * @return void
   */		
	function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */