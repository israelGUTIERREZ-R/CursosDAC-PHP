<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Bases de Datos | Base de datos UNINAV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/0.2 e.desp.log.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="shortcut icon" href="uninav.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/bootstrap4.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha512-Ua/7Woz9L5O0cwB/aYexmgoaD7lw3dWe9FvXejVdgqu71gRog3oJgjSWQR55fwWx+WKuk8cl7UwA1RS6QCadFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.0/sweetalert2.all.js" integrity="sha512-13385TgF1r3EtQdRsBYMM9orUX+AB96en1OwtIuVNadPEzAgVd8IbJgS//FcuDwF0lsdK3GkUpqGFKPwvu6MaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="JS/ElegirBD.js"></script>
    <style>
        .miEstilo {
            font-family: verdana;
            font-size: 17pt;
        }

        .fondo {
            background-color: white !important;
            color: black !important;
            box-shadow: none !important;
        }

        .fondo:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        .contra::placeholder {
            color: black !important;
        }
    </style>
</head>

<body>
    <div id="loadingMessage"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(35, 35, 35,0.8);
             z-index: 9999; text-align: center; padding-top: 20%; font-family: verdana; font-size: 30pt; color:rgb(240, 240, 240);">
        <div class="loader">
            <b>Generando base de datos<span>.</span> <span>.</span> <span>.</span> </b>
        </div>
    </div>
    <!-- //////////////////////////////////////////Video de fondo //////////////////////////////////////////////////// -->
    <video src="multimedia/vortex_-_49184 (540p).mp4" autoplay="true" muted="true" loop="true">
    </video>
    <!-- //////////////////////////////////////////Zona de contenedores//////////////////////////////////////////////////// -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <!-- //////////////////////////////////////////Area de UNINAV//////////////////////////////////////////////////// -->
                        <div class="row fondo-menu">
                            <h1 class="coloruninav">
                                <img src="images/escudo de la unninav.png" class="logo" style="margin-top: 10px;">
                                <br>
                                Universidad Naval
                                <br>
                                Base de datos.
                            </h1>
                        </div>

                        <!-- //////////////////////////////////////////Area de SEMAR//////////////////////////////////////////////////// -->
                        <div class="row fondo-SEMAR">
                            <h1 class="colorsemar">
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp;
                                SEMAR
                            </h1>
                        </div>
                        <!-- //////////////////////////////////////////Area del menu //////////////////////////////////////////////////// -->
                        <div class="row">

                        </div>
                        <!-- ////////////////////////////////////////// Boton desplegable//////////////////////////////////////////////////// -->
                        <form method="post">
                            <div class="row justify-content-center">
                                <div class="input-group mb-3 ajust-select fondo">

                                    <select name="combo"
                                        class="custom-select fondo-submenu boton-desplegable letras-boton "
                                        id="inputGroupSelect02">
                                        <option value="Select">Seleccione un año de consulta.</option>
                                        <?php
                                        if (isset($_SESSION['User']) && isset($_SESSION['Pass'])) {
                                            $user = $_SESSION['User'];
                                            $pass = $_SESSION['Pass'];
                                            $_SESSION['Users'] = $user;
                                        } else {
                                            echo "<h2>USUARIO NO ESPECIFICADO</h2>";
                                        }
                                        $conexion = new PDO('mysql:host=127.0.0.1;dbname=cursosdac;charset=utf8', 'root', '1234');
                                        $query = "SHOW databases LIKE '%cursosdac%';";
                                        $rs = $conexion->query($query);
                                        if ($rs->rowCount() > 0) {
                                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value=\"" . $row['Database (%cursosdac%)'] . "\">" . $row['Database (%cursosdac%)'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <!-- //////////////////////////////////////////////////  Boton para llamar a la tabla /////////////////////////////////-->
                            <div class="row justify-content-center">
                                <input type="button" class="btn-select margen" id="btn" name="boton" value="SELECCIONAR"
                                    onclick="elegirBD()" />
                            </div>

                            <!-- //////////////////////////////////////////////////  Boton para llamar a la tabla /////////////////////////////////-->
                            <?php
                            if (isset($_SESSION['RolUser']) && $_SESSION['RolUser'] == "root") {

                                ?>
                                <div class="row justify-content-center">
                                    <input type="button" class="btn-select espaciado" id="btn" name="botonC"
                                        value="CREAR BASE DE DATOS" onclick="nombreBD()" />
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row justify-content-center">
                                <input type="button" class="btn-select espaciado" id="btn" name="botonS"
                                    value="CERRAR SESIÓN" onclick="window.location.href='servlets/CerrarSesion.php';" />
                            </div>
                        </form>
                        <!-- //////////////////////////////////////////////////   /////////////////////////////////-->
                    </div>
                </div>
            </div>
            <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                <p><br><br>&copy; 2024. Universidad Naval</p>
                <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México
                    CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                <img src="images/fpleca monedita.png" class="foot-img img-fluid"><img src="images/fpleca monedita.png"
                    class="foot-img img-fluid"><img src="images/fpleca monedita.png" class="foot-img img-fluid">
            </div>
        </div>

        <script>
            window.addEventListener('unload', function (event) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'actualizar_estado_usuario.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send();
            });
        </script>
</body>

</html>