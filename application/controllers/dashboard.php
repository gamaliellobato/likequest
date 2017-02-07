<?php 	

/**
* 
*/
class DashBoard extends CI_Controller
{
	
	public function index()
	{	
		$this->session->sess_destroy();

		$email = $this->input->post('username');
		$password = $this->input->post('password');

		//echo $email." ".$password;
		$this->load->model('user');
		
		$fila = $this->user->getUser($email,$password);

		if($fila != null){
			if ($fila->password == $password) {

				$data = array(
					'email' => $email,
					'password' => $fila->password,
					'id'=> $fila->id_usuarios,
					'login' => true
					);

				$this->session->set_userdata($data);
			}else{
				header("Location: ". base_url());
			}
		}
		else{
			header("Location: ". base_url());
		}

		$data = array(
			'email' => $email, 
			'id'    => 0,
			'login' => true);

		$this->session->set_userdata($data);

		
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

	public function logout(){
		$this->session->sess_destroy();
		header("Location:". base_url());
	}
}

 ?>