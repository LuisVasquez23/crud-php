<?php

// LLAMAR LOS DOCUMENTOS NECESARIOS
require_once 'config/conexion.php';
require_once 'models/Usuario.php';
require_once "dao/UsuarioDAO.php";
require_once 'controller/UsuarioController.php';

$controlador = new UsuarioController();

$usuarios = $controlador->listarUsuarios();

session_start();

// Vista
require_once 'template/header.php';
?>

<main class="container mt-4 pt-2">
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="./views/usuario/crear_usuario.php" class="btn btn-success btn-sm">Agregar usuario</a>
        </div>
        <?php
        if (isset($_SESSION['accion'])) :
            echo ('<div class="' . $_SESSION['accion']['clase'] . '" role="alert">
                ' . $_SESSION['accion']['mensaje'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

            unset($_SESSION['accion']);
        endif;
        ?>
        <div class="col-md-12">
            <table class="table table-bordered text-center table-hover">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?= $usuario->getId() ?></td>
                            <td><?= $usuario->getNombre() ?></td>
                            <td><?= $usuario->getApellido() ?></td>
                            <td>
                                <div class="btn-group">
                                    <button onclick="eliminarUsuario(<?= $usuario->getId() ?>)" class="btn btn-danger btn-sm" title="Eliminar usuario">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <a href="./views/usuario/editar_usuario.php?id=<?= $usuario->getId() ?>" class="btn btn-primary btn-sm" title="Editar usuario">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<!-- JS -->
<script src="public/js/index.js"></script>
<?php
require_once 'template/footer.php';
?>