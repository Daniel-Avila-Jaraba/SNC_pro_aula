<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "perfiles_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $avatar = "default_avatar.png"; // Puedes permitir la subida de avatares

    $sql = "INSERT INTO perfiles (nombre, avatar) VALUES ('$nombre', '$avatar')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear perfil</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Crear un nuevo perfil</h1>
        <form method="post">
            <label for="nombre">Nombre del perfil:</label>
            <input type="text" id="nombre" name="nombre" required>
            <button type="submit">Crear perfil</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
