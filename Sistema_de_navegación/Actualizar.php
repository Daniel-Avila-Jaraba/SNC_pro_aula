<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_usuario']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['perfiles'])) {
        $connection_obj = mysqli_connect("localhost", "root", "", "sistema_de_navegación_cartagena");
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }

        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $perfiles = $_POST['perfiles'];

        $query = "UPDATE tb_datauser SET Nombre='$nombre', Email='$email', Perfiles='$perfiles' WHERE ID_USER='$id_usuario'";

        $result = mysqli_query($connection_obj, $query);
        if ($result) {
            echo "Los datos del usuario han sido actualizados correctamente.";
        } else {
            echo "Error al actualizar los datos del usuario: " . mysqli_error($connection_obj);
        }

        mysqli_close($connection_obj);
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
}
?>