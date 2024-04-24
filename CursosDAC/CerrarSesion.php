<?php
    session_start();
    if (isset($_SESSION['User'])) {
        $user = $_SESSION['User'];
        $rol = $_SESSION['RolUser'];
        $baseDatos = $_POST['BaseDatos'];
        echo $baseDatos;

        $conexion = new mysqli("127.0.0.1", "root", "", "cursosdac");
        $query2 = "UPDATE usuario SET usuario.EstadoUsuario=0 WHERE usuario.nombreUsuario='" . $user . "' AND usuario.Rol='" . $rol . "';";
        if ($conexion->query($query2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conexion->error;
        }

        $conexion = new mysqli("127.0.0.1", "root", "", $baseDatos);
        $query2 = "UPDATE usuario SET usuario.EstadoUsuario=0 WHERE usuario.nombreUsuario='" . $user . "' AND usuario.Rol='" . $rol . "';";
        if ($conexion->query($query2) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conexion->error;
        }

        header("Location: index.php");
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        session_destroy();
    }
