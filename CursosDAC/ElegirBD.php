<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial Bases de Datos | Base de datos UNINAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="0.2 e.desp.log.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="shortcut icon" href="uninav.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="ElegirBD.js"></script>
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
        <div id="loadingMessage" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(35, 35, 35,0.8);
             z-index: 9999; text-align: center; padding-top: 20%; font-family: verdana; font-size: 30pt; color:rgb(240, 240, 240);">
            <div class="loader">
                <b>Generando base de datos<span>.</span> <span>.</span> <span>.</span> </b>
            </div>
        </div>
        <!-- //////////////////////////////////////////Video de fondo //////////////////////////////////////////////////// -->
        <video 
            src="multimedia/vortex_-_49184 (540p).mp4" autoplay="true" 
            muted="true" 
            loop="true" >
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
                                    <img src="images/escudo de la unninav.png" class="logo" 
                                         style="margin-top: 10px;">
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
                            <form>
                                <div class="row justify-content-center">
                                    <div class="input-group mb-3 ajust-select fondo">

                                        <select class="custom-select fondo-submenu boton-desplegable letras-boton " id="inputGroupSelect02" method="post" name="combo">
                                            <option value="Select">Seleccione un año de consulta.</option>
                                            <?php
                                                session_start();
                                                $user = $_SESSION["User"];
                                                $pas = $_SESSION["Pass"];
                                                $_SESSION["Users"] = $user;
                                                $conexion = new mysqli("127.0.0.1", "root", "", "cursosdac");
                                                $query = "SHOW databases LIKE '%cursosdac%';";
                                                $rs = $conexion->query($query);
                                                while ($row = $rs->fetch_assoc()) {
                                                    echo "<option value=\"" . $row['Database'] . "\">" . $row['Database'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <!-- //////////////////////////////////////////////////  Boton para llamar a la tabla /////////////////////////////////-->
                                <div class="row justify-content-center">
                                    <input type="button" class="btn-select margen" id="btn" name="boton" value="SELECCIONAR" onclick="elegirBD()" />  
                                </div>
                                <?php
                                    /*$opc = $_POST["combo"];
                                    echo $opc;
                                    $_SESSION["BaseDatos"] = $opc;
                                    $databaseName = $_SESSION["BaseDatos"];
                                    $_SESSION["BaseDatos"] = $opc;
                                    $rol = $_SESSION["RolUser"];
                                    $_SESSION["Roles"] = $rol;      
                                    if ($rol != null && $rol == "root") {*/
                                ?>
    <!-- //////////////////////////////////////////////////  Boton para llamar a la tabla /////////////////////////////////-->
    <div class="row justify-content-center">
        <input type="button" class="btn-select espaciado" id="btn" name="botonC" value="CREAR BASE DE DATOS" onclick="nombreBD()" />
    </div>
    <?php
                                    //}
    ?>
    <div class="row justify-content-center">
        <input type="button" class="btn-select espaciado" id="btn" name="botonS" value="CERRAR SESIÓN" onclick="window.location.href = 'SesionServlet'" />
    </div>
</form>
                            <!-- //////////////////////////////////////////////////   /////////////////////////////////-->
                        </div>
                    </div>
                </div>
                <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                    <p><br><br>&copy; 2024. Universidad Naval</p>
                    <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                    <img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid">
                </div>
            </div>
    </body>
</html>
