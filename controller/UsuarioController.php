<?php

class UsuarioController
{
    private $usuarioDAO;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->usuarioDAO = new UsuarioDAO($conexion->conectar());
    }

    public function listarUsuarios()
    {
        $usuarios = $this->usuarioDAO->listarUsuarios();
        return $usuarios;
    }

    public function crearUsuario()
    {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];

        $estado = array(
            "mensaje" => "Sucedió un error al momento de agregar el usuario",
            "clase" => "alert alert-warning"
        );

        if ($this->usuarioDAO->crearUsuario($nombre, $apellido)) {
            $estado = array(
                "mensaje" => "Agregado exitosamente",
                "clase" => "alert alert-success"
            );
        }

        session_start();
        $_SESSION['accion'] = $estado;

        header("location: ../../index.php");
    }

    public function buscarUsuario()
    {
        $id_usuario = $_GET['id'];
        $usuario = $this->usuarioDAO->buscarUsuario($id_usuario);
        return $usuario;
    }

    public function eliminarUsuario()
    {
        $id_usuario = $_GET['id'];

        session_start();

        $estado = array(
            "mensaje" => "Sucedió un error al momento de eliminar",
            "clase" => "alert alert-warning"
        );

        if ($this->usuarioDAO->eliminarUsuario($id_usuario)) {
            $estado = array(
                "mensaje" => "Eliminado exitosamente",
                "clase" => "alert alert-success"
            );
        }

        $_SESSION['accion'] = $estado;

        header("location: ../../index.php");
    }

    public function editarUsuario()
    {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $id_usuario = $_POST['id_usuario'];

        $estado = array(
            "mensaje" => "Sucedió un error al momento de editar el usuario",
            "clase" => "alert alert-warning"
        );

        if ($this->usuarioDAO->editarUsuario($id_usuario, $nombre, $apellido)) {
            $estado = array(
                "mensaje" => "Editado exitosamente",
                "clase" => "alert alert-success"
            );
        }

        session_start();
        $_SESSION['accion'] = $estado;

        header("location: ../../index.php");
    }
}
