<?php

// LLAMAR LOS DOCUMENTOS NECESARIOS

require_once '../../config/conexion.php';
require_once '../../models/Usuario.php';
require_once("../../dao/UsuarioDAO.php");
require_once '../../controller/UsuarioController.php';

$controlador = new UsuarioController();

if (isset($_POST['agregar'])) {
    $controlador->crearUsuario();
}

// Vista
require_once '../../template/header.php';
?>

<main class="container mt-4 pt-2">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2>Agregar usuario</h2>
        </div>
        <div class="col-md-12">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" required>
                    </div>
                    <div class="col-md-6 mt-3 form-group">
                        <input type="submit" value="Guardar" name="agregar" class="btn btn-primary btn-sm">
                        <a href="../../index.php" class="btn btn-dark btn-sm">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once '../../template/footer.php';
?>