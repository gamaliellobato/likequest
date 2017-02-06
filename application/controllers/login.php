<?php 	
/**
* 	
*/
class Login extends CI_Controller
{
	
	public function index()
	{
		$data = array('title' => 'Dashboard', 'app' => 'Likequest');
		$this->load->view("includes/head",$data);


		$this->load->view("login", $data);
		
		$this->load->view("includes/footer");
	}
}

?>