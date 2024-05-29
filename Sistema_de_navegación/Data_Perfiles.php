<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $placa = $_POST['Placa'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];

    // Establecer la conexión a la base de datos
    $connection_obj = mysqli_connect("localhost", "root", "", "sistema_de_navegación_cartagena");
    if (!$connection_obj) {
        echo "Error No: " . mysqli_connect_errno();
        echo "Error Description: " . mysqli_connect_error();
        exit;
    }

    // Escapar los valores para evitar inyección de SQL
    $placa = mysqli_real_escape_string($connection_obj, $placa);
    $marca = mysqli_real_escape_string($connection_obj, $marca);
    $modelo = mysqli_real_escape_string($connection_obj, $modelo);

    // Construir la consulta SQL para insertar los datos en la tabla
    $query_insert_data = "INSERT INTO tb_dataprofiles (Placa, Marca, Modelo) VALUES ('$placa', '$marca', '$modelo')";

    // Ejecutar la consulta SQL para insertar los datos
    $result_insert_data = mysqli_query($connection_obj, $query_insert_data);

    // Verificar si la inserción se ejecutó correctamente
    if ($result_insert_data) {
        echo "Los datos se guardaron correctamente en la tabla tb_dataprofiles.";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($connection_obj);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($connection_obj);
} else {
    echo "Acceso denegado.";
}
?>
