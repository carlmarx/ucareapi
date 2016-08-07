<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('apikey_model');
	}
	
	protected function allowAnonymous()
	{
		return true;
	}
	
	public function index()
	{
		echo "Welcome to API Page";
	}

	public function login(){
		// if($this->input->method() != 'post'){
		// 	show_404();
		// }
		//get username and password
		//var_dump($HTTP_RAW_POST_DATA);
		//die();
		$input = new stdClass();
		$input->email = trim($this->input->post('email'));
		$input->password = $this->input->post('password');
		$login = $this->user_model->apiLogin($input);

		$loginData = new stdClass();
		$loginData->successful = "false";

		if($login->successful == "true"){

			$loginData = $this->apikey_model->generateKey($login);
		}

		// var_dump($loginData);
		//var_dump($login);

		// $arr['email'] = $email;
		// $arr['password'] = $password;
		// session_destroy();
		// session_start();
		// $arr['authCode'] = session_id();
		// print_r($_REQUEST);
		log_message('info', $loginData->successful);
		header('Content-Type: application/json');
		echo json_encode( $loginData );
	}

	public function logout(){
		$authCode = trim($this->input->post('authCode'));
		$data["deleteSuccess"] = $this->apikey_model->deleteByAuthCode($authCode);
		
		header('Content-Type: application/json');
		echo json_encode( $data );
	}
	
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */