<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['perfiles']) && !empty($_POST['perfiles'])) {
        
        // Establecer la conexión a la base de datos
        $connection_obj = mysqli_connect("localhost", "root", "", "sistema_de_navegación_cartagena");
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }
        
        // Obtener los perfiles seleccionados del formulario
        $perfiles = $_POST['perfiles'];
        
        // Escapar los valores de los perfiles para evitar inyección de SQL
        $perfiles_escaped = array();
        foreach ($perfiles as $perfil) {
            $perfiles_escaped[] = mysqli_real_escape_string($connection_obj, $perfil);
        }
        
        // Unir los perfiles escapados para su inserción en la tabla
        $tipos = implode(',', $perfiles_escaped);
        
        // Verificar si hay una sesión de usuario activa
        if (isset($_SESSION['ID_USER'])) {
            $id_usuario = $_SESSION['ID_USER']; 
        } else {
            echo "Error: No se ha encontrado el ID de usuario en la sesión.";
            exit;
        }
        
        // Construir la consulta SQL para insertar los perfiles en la tabla tb_dataprofiles
        $query_insert_perfiles = "INSERT INTO tb_dataprofiles (Tipo) VALUES ('$tipos')";
        
        // Ejecutar la consulta SQL para insertar los perfiles
        $result_insert_perfiles = mysqli_query($connection_obj, $query_insert_perfiles);
        
        // Verificar si la inserción de perfiles se ejecutó correctamente
        if (!$result_insert_perfiles) {
            echo "Error al guardar los perfiles para el usuario con ID $id_usuario: " . mysqli_error($connection_obj) . "<br>";
            mysqli_close($connection_obj);
            exit;
        }
        
        // Obtener el ID del último perfil insertado
        $id_perfil = mysqli_insert_id($connection_obj);
        
        // Construir la consulta SQL para insertar la relación en la tabla tb_profiles
        $query_insert_relacion = "INSERT INTO tb_profiles (ID_U, ID_P) VALUES ('$id_usuario', '$id_perfil')";
        
        // Ejecutar la consulta SQL para insertar la relación
        $result_insert_relacion = mysqli_query($connection_obj, $query_insert_relacion);
        
        // Verificar si la inserción de la relación se ejecutó correctamente
        if (!$result_insert_relacion) {
            echo "Error al guardar la relación usuario-perfil para el usuario con ID $id_usuario: " . mysqli_error($connection_obj) . "<br>";
            mysqli_close($connection_obj);
            exit;
        }
        
        // Cerrar la conexión a la base de datos
        mysqli_close($connection_obj);
        
        echo "Perfiles y relación usuario-perfil guardados correctamente para el usuario con ID $id_usuario.<br>";
        
    } else {
        echo "Error: Por favor, seleccione al menos un perfil.";
    }
} else {
    // Mostrar el formulario HTML
    include('Form_dataprofile.html');
}
?>
