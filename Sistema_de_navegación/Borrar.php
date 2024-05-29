<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_usuario'])) {
        $connection_obj = mysqli_connect("localhost", "root", "", "sistema_de_navegación_cartagena");
        if (!$connection_obj) {
            echo "Error No: " . mysqli_connect_errno();
            echo "Error Description: " . mysqli_connect_error();
            exit;
        }

      
        $id_usuario = $_POST['id_usuario'];

 
        $query = "DELETE FROM tb_datauser WHERE ID_USER='$id_usuario'";

        $result = mysqli_query($connection_obj, $query);
        if ($result) {
            echo "El usuario ha sido eliminado correctamente.";
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($connection_obj);
        }

     
        mysqli_close($connection_obj);
    } else {
        echo "Por favor, especifique el Identificación del usuario a eliminar.";
    }
}
?>
