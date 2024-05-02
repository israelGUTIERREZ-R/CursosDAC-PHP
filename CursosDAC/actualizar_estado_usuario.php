<?php
session_start();

if (isset($_SESSION['LastLoggedInUser'])){
    if(isset($_SESSION['BaseDatos'])){
        $dsn = "mysql:host=127.0.0.1;dbname=".$_SESSION['BaseDatos'].";charset=utf8";
        $username = "root";
        $password = "1234";
        $pdo = new PDO($dsn, $username, $password);

        $updateQuery = "UPDATE usuario SET EstadoUsuario = 0 WHERE nombreUsuario = ?";
        $statement = $pdo->prepare($updateQuery);
        $statement->bindParam(1, $_SESSION['LastLoggedInUser'], PDO::PARAM_STR);
        $statement->execute();

    }
        $dsn2 = "mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8";
        $pdo2 = new PDO($dsn2, $username, $password);
        
        $updateQuery2 = "UPDATE usuario SET EstadoUsuario = 0 WHERE nombreUsuario = ?";
        $statement2 = $pdo2->prepare($updateQuery2);
        $statement2->bindParam(1, $_SESSION['LastLoggedInUser'], PDO::PARAM_STR);
        $statement->execute();
        $pdo = null;
        $pdo2 = null;
        header("Location:IniciarSesion.php");
}