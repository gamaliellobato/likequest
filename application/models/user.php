<?php 	
/**
* 
*/
class User extends CI_Model
{
	public function getUser($email='', $password = '')
	{
		$status = 1;
		$result = $this->db->query("SELECT * FROM usuarios WHERE email = '". $email ."' AND password = '".$password."' AND status =1" );

		if($result->num_rows() > 0)
		{
			return $result->row();
		}
		else
		{
			return null;
		}
	}
}
?>