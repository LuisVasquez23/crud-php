function eliminarUsuario(id){
    Swal.fire({
        title: '¿Está seguro en eliminar el usuario seleccionado?',
        text: "Al dar click no se podrá revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = `./views/usuario/eliminar_usuario.php?id=${id}`;
        }
      })
}