<?php
session_start(); 

$connection_obj = mysqli_connect("localhost", "root", "", "sistema_de_navegación_cartagena");

if(!$connection_obj)
{
    echo "Error de conexión a la base de datos: " . mysqli_connect_error();
    exit;
}

$use = $_POST['Email'];
$pass = $_POST['Pass'];

$query = "SELECT * FROM tb_datauser WHERE Email ='$use' AND Pass ='$pass'";
$resul = mysqli_query($connection_obj, $query) or die(mysqli_error($connection_obj));

if ($row = mysqli_fetch_array($resul, MYSQLI_BOTH)) {
    $_SESSION['ID_USER'] = $row['ID_USER'];
    $perfiles = $row['Perfiles']; 
    if ($perfiles == 'Admin') {
        $v = 'Admin.html';
        header('Location: '.$v);
    } elseif ($ID_P == null) {
        $v = 'Form_profi.html';
        header('Location: '.$v);
    } elseif ($ID_P == MYSQLI_NOT_NULL_FLAG ) {      
        $v = 'Select_profile.php';
        header('Location: '.$v);
    }
} else {
    echo "Usuario y contraseña incorrectos";
}

mysqli_close($connection_obj);
?>
