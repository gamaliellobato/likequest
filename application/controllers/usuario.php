<?php
/**
 *
 */
class Usuario extends CI_Controller
{
    public function index()
    {
        $data = array('title' => 'Dashboard', 'app' => 'Likequest');
        $this->load->view("guest/head", $data);

        $data = array('mensaje' => 'estas en dashboard');

        $result = $this->db->get('sucursales');
        $data   = array('consulta' => $result);

        $this->load->view("crearUsuario", $data);
        $this->load->view("guest/nav");

        $data = array('post' => 'Blog', 'descripcion' => 'Biendvenido al dashboard de codeiniter');
        $this->load->view("guest/footer");
        $this->load->view("dashboard", $data);
    }

    public function nuevoUsuario()
    {
        //Se carga el modelo Usuario
        $this->load->model('user');

        $nombre      = $this->input->post('nombre');
        $paterno     = $this->input->post('paterno');
        $materno     = $this->input->post('materno');
        $email       = $this->input->post('email');
        $password    = md5($this->input->post('password'));
        $id_rol      = $this->input->post('rol');
        $id_sucursal = $this->input->post('sucursal');

        $fila = $this->user->nuevoUsuario($nombre, $paterno, $materno, $email, $password, $id_rol, $id_sucursal);

        if ($fila == null) {
            echo "<script>"+
                "alert('Estás suscrito, ¡Gracias!.');"+

                "</script>";
        } else {
            echo "<script>"+
                "alert('Estás suscrito, ¡Gracias!.');"+

                "</script>";
        }
    }

}
