<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	

	public function authenticate() {
		// get username and password
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		// load the model and call the authenticate method
		$this->load->model('Session_model');
		$result = $this->Session_model->user_authenticate($username, $password);

		// return 
		
	}

	public function buscar() {
		// get username and password
			
	$this->load->view('buscarcarpool');
		
	}

	/**
	 * Index Page for this controller.
	public function login($error, $code) {
		$data['title'] = "Please login to Webmail";
		$this->load->view('login', $data);
	}
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
	public function index()
	{
	$this->load->model('Offers_model');
		$today = date("Y-m-d H:i:s");
		$offers = $this->Offers_model->offers_by_day($today);
		$data['array'] = $offers;
		
		$this->load->view('welcome_message',$data);

	
	}






}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */