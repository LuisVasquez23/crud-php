<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellido;

    public function __construct($id, $nombre, $apellido)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
}
