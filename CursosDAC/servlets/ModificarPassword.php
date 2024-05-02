<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nombreUser = $_POST['USER'];
        $rolUser = $_POST['ROL'];
        $contraUser = $_POST['PASS'];
        $baseDatos = $_POST['BaseDatos'];

        $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
        $query = "UPDATE usuario SET password = :contraUser WHERE usuario.NombreUsuario = :nombreUser AND usuario.rol = :rolUser";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':contraUser', $contraUser);
        $stmt->bindParam(':nombreUser', $nombreUser);
        $stmt->bindParam(':rolUser', $rolUser);
        $stmt->execute();

        $conexion2 = new PDO('mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8', 'root', '1234');
        $query2 = "UPDATE usuario SET password = :contraUser WHERE usuario.NombreUsuario = :nombreUser AND usuario.rol = :rolUser";
            $stmt2 = $conexion2->prepare($query);
            $stmt2->bindParam(':nombreUser', $nombreUser);
            $stmt2->bindParam(':contraUser', $contraUser);
            $stmt2->bindParam(':rolUser', $rolUser);
            $stmt2->execute();

            $sessionUser = $_SESSION['Pass'] = $contraUser;
    }