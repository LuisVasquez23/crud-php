<?php

class UsuarioDAO
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function listarUsuarios()
    {
        $stmt = $this->conexion->prepare("SELECT * FROM usuario");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        $usuarios = array();
        foreach ($resultado as $fila) {
            $usuario = new Usuario($fila["id_usuario"], $fila["nombre"], $fila["apellido"]);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    public function crearUsuario($nombre, $apellido)
    {

        $agregado = false;

        try {
            $stmt = $this->conexion->prepare("INSERT INTO usuario(nombre, apellido) VALUES (:nombre, :apellido)");
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->execute();

            $agregado = true;
        } catch (\Throwable $th) {
            $agregado = false;
        }

        return $agregado;
    }

    public function buscarUsuario($id_usuarioP)
    {

        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
        $stmt->bindParam(":id_usuario", $id_usuarioP);
        $stmt->execute();
        $resultado = $stmt->fetch();

        $usuario = new Usuario($resultado['id_usuario'], $resultado['nombre'], $resultado['apellido']);

        return $usuario;
    }

    public function eliminarUsuario($id_usuarioP)
    {
        $eliminado = false;

        try {
            $consulta = "DELETE FROM usuario WHERE id_usuario = :id";
            $sentencia = $this->conexion->prepare($consulta);
            $sentencia->bindValue(':id', $id_usuarioP, PDO::PARAM_INT);
            $sentencia->execute();

            $eliminado = true;
        } catch (Exception $error) {
            $eliminado = false;
        }

        return $eliminado;
    }

    public function editarUsuario($id_usuarioP, $nombreP, $apellidoP)
    {
        $actualizado = false;

        try {
            $consulta = "UPDATE usuario SET nombre = :nombre , apellido = :apellido WHERE id_usuario = :id";
            $sentencia = $this->conexion->prepare($consulta);
            $sentencia->bindValue(':nombre', $nombreP, PDO::PARAM_STR);
            $sentencia->bindValue(':apellido', $apellidoP, PDO::PARAM_STR);
            $sentencia->bindValue(':id', $id_usuarioP, PDO::PARAM_INT);
            $sentencia->execute();

            $actualizado = true;
        } catch (Exception $error) {
            $actualizado = false;
        }

        return $actualizado;
    }
}
