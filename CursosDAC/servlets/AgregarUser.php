<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nombreUser = $_POST['USER'];
        $rolUser = $_POST['ROL'];
        $contraUser = $_POST['PASS'];
        $baseDatos = $_POST['BaseDatos'];

        $conn = new PDO('mysql:host=127.0.0.1;dbname='.$baseDatos.';charset=utf8', 'root', '1234');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO usuario(NombreUsuario, Password, Rol, EstadoUsuario) VALUES (:nombreUser, :contraUser, :rolUser, 0)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nombreUser', $nombreUser);
            $stmt->bindParam(':contraUser', $contraUser);
            $stmt->bindParam(':rolUser', $rolUser);
            $stmt->execute();
        
        $conn2 = new PDO('mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8', 'root', '1234');
            $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query2 = "INSERT INTO usuario(NombreUsuario, Password, Rol, EstadoUsuario) VALUES (:nombreUser, :contraUser, :rolUser, 0)";
            $stmt2 = $conn2->prepare($query2);
            $stmt2->bindParam(':nombreUser', $nombreUser);
            $stmt2->bindParam(':contraUser', $contraUser);
            $stmt2->bindParam(':rolUser', $rolUser);
            $stmt2->execute();

    }