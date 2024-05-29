<?php
// Establecer la conexión a la base de datos
$connection_obj = mysqli_connect("localhost", "root", "", "sistema_de_navegación_cartagena");
if (!$connection_obj) {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
    exit;
}

// Construir la consulta SQL para obtener usuarios y perfiles asociados
$query = "SELECT tb_datauser.*, GROUP_CONCAT(tb_dataprofiles.Tipo SEPARATOR ', ') AS Perfiles
          FROM tb_datauser
          INNER JOIN tb_profiles ON tb_datauser.ID_USER = tb_profiles.ID_U
          INNER JOIN tb_dataprofiles ON tb_profiles.ID_P = tb_dataprofiles.ID_Profile
          GROUP BY tb_datauser.ID_REG";

// Ejecutar la consulta SQL
$result = mysqli_query($connection_obj, $query);

// Verificar si se obtuvieron resultados
if ($result) {
    // Mostrar los datos de los usuarios y sus perfiles asociados
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['ID_REG'] . "<br>";
        echo "Nombre: " . $row['Nombre'] . "<br>";
        echo "Email: " . $row['Email'] . "<br>";
        echo "Perfiles: " . $row['Perfiles'] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($connection_obj);
}

// Cerrar la conexión a la base de datos
mysqli_close($connection_obj);
?>