<?php

if (!empty($_POST["registro"])){
    if (empty($_POST["new_user"]) or empty($_POST["new_pass"]) or empty($_POST["new_name"])) {
        echo "Error: Por favor, complete todos los campos.";
}
    } else {
        $new_user=$_POST["new_user"];
        $new_pass=$_POST["new_pass"];
        $new_name=$_POST["new_name"];
        $sql=$conexion->query(" insert into tb_datausero(Nombre,Pass,Email) values('$new_user','$new_pass','$new_name') ");
        if ($sql==1) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Usuario no registrado.";
        }
        
     }
    
?>