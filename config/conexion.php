<?php

class Conexion
{
    private $host = "localhost";
    private $dbname = "crud-php";
    private $usuario = "root";
    private $contrasena = "";

    public function conectar()
    {
        try {
            $conexion = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->usuario, $this->contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error al conectarse a la base de datos: " . $e->getMessage();
            die();
        }
    }
}
