<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_de_navegación_cartagena";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['profile-name'];
    $image_url = $_POST['profile-image'];

    $sql = "INSERT INTO profiles (name, image_url) VALUES ('$name', '$image_url')";
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo perfil creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$perfiles = [];
$sql = "SELECT id, name, image_url FROM profiles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $perfiles[] = $row;
    }
}

$conn->close();
?>