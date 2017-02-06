<?php 	

/**
* 
*/
class DashBoard extends CI_Controller
{
	
	public function index()
	{
		//print("Dashboard");
		$data = array('title' => 'Dashboard', 'app' => 'Likequest');
		$this->load->view("guest/head",$data);

		$data = array('mensaje' => 'estas en dashboard');

		$result = $this->db->get('sucursales');
		$data = array('consulta' => $result );

		$this->load->view("guest/content", $data);
		$this->load->view("guest/nav");

		$data = array('post' => 'Blog', 'descripcion' => 'Biendvenido al dashboard de codeiniter' );
		$this->load->view("guest/footer");
		$this->load->view("dashboard",$data);


	}
}

 ?>