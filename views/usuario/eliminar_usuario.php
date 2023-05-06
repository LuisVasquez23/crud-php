<?php

// VERIFICAR QUE EXISTA EL ID POR LA URL
if (!isset($_GET['id'])) {
    header('location: ../../index.php');
}

// LLAMAR LOS DOCUMENTOS NECESARIOS
require_once '../../config/conexion.php';
require_once '../../models/Usuario.php';
require_once("../../dao/UsuarioDAO.php");
require_once '../../controller/UsuarioController.php';

$controlador = new UsuarioController();

$usuario = $controlador->eliminarUsuario();
