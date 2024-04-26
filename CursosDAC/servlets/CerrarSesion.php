<?php
    session_start();
    if (isset($_SESSION['User'])) {
        $user = $_SESSION['User'];
        $rol = $_SESSION['RolUser'];
        $baseDatos = $_GET['BaseDatos'];

        $conexion = new PDO('mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8', 'root', '1234');
        $query2 = "UPDATE usuario SET usuario.EstadoUsuario=0 WHERE usuario.nombreUsuario='" . $user . "' AND usuario.Rol='" . $rol . "';";
        $conexion->exec($query2);
        
        if(isset($_GET['BaseDatos'])){
            $conexion2 = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
            $query3 = "UPDATE usuario SET usuario.EstadoUsuario=0 WHERE usuario.nombreUsuario='" . $user . "' AND usuario.Rol='" . $rol . "';";
            $conexion2->exec($query3);
        }else{
            echo "BASE DE DATOS NO DETECTADA";
        }

        header("Location:../index.php");
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        session_destroy();
        
        exit();
    }
