<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['BaseDatos'])){
            $bd = $_POST['BaseDatos'];
            echo $bd;
            $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$bd.';charset=utf8', 'root', '1234');
                if(isset($_SESSION['User'])&&isset($_SESSION['Pass'])){
                    $user = $_SESSION['User'];
                    $pass = $_SESSION['Pass'];
                    $_SESSION['Users']=$user;
                    $query2 = "UPDATE usuario SET usuario.EstadoUsuario=1 WHERE usuario.nombreUsuario=\"" . $user . "\" AND usuario.Password=\"" . $password . "\";";
                    $conexion->exec($query2);
                    exit();
                }
        }else{
            echo "No se tiene el nombre de la base de datos";
        }

    }