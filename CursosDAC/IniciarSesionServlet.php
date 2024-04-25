<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['cajaUser'])&&isset($_POST['cajaPassword'])){
            $user = $_POST['cajaUser'];
            $password = $_POST['cajaPassword'];
            if ($user == "" || $password == "") {
                echo "<br><br><h3>Favor de llenar el o los campos faltantes</h3>";
            }else{
                $conexion = new PDO('mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8', 'root', '1234');
                $query = "SELECT usuario.nombreUsuario, usuario.Password, usuario.Rol, usuario.EstadoUsuario from usuario where usuario.nombreUsuario=\"" . $user
                    . "\" AND usuario.Password=\"" . $password . "\";";
                $rs = $conexion->query($query);
                if ($rs->rowCount() > 0){
                    $row = $rs->fetch(PDO::FETCH_ASSOC);
                    if ($user == $row['nombreUsuario'] && $password == $row['Password']){
                        $_SESSION['User'] = $row['nombreUsuario'];
                        $_SESSION['Pass'] = $row['Password'];
                        $_SESSION['RolUser'] = $row['Rol'];
                        $_SESSION['LastLoggedInUser'] = $user;
                        if ($row['EstadoUsuario'] == 0){
                            $query2 = "UPDATE usuario SET usuario.EstadoUsuario=1 WHERE usuario.nombreUsuario=\"" . $user . "\" AND usuario.Password=\"" . $password . "\";";
                            $conexion->exec($query2);
                            header('Location:ElegirBD.php');
                            exit();
                        }else {
                            echo "<br><br><h3 style=\"font-size:20pt;\">Se ha detectado un inicio de sesión en otro dispositivo. Favor de notificar o cerrar la cuenta</h3>";
                        }
                    }else {
                        echo "<br><br><h3>Favor de rectificar usuario y/o contraseña</h3>";
                    }
                }else {
                    if ($user != null && $password != null) {
                        echo "<br><br><h3>Usuario no encontrado. Favor de rectificar usuario y/o contraseña</h3>";
                    }
                }
            }
        }

    }