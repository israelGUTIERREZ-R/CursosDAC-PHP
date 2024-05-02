<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver Perfil | Base de datos UNINAV</title>
        <link rel="shortcut icon" href="uninav.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="CSS/9.1 cuenta.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        < <link rel="stylesheet" href="CSS/bootstrap4.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha512-Ua/7Woz9L5O0cwB/aYexmgoaD7lw3dWe9FvXejVdgqu71gRog3oJgjSWQR55fwWx+WKuk8cl7UwA1RS6QCadFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="JS/DinamicaVentanas.js"></script>
        <script src="JS/ModificarPerfil.js"></script>
    </head>
    <body>
        <div id="loadingMessage" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(35, 35, 35,0.8);
             z-index: 9999; text-align: center; padding-top: 20%; font-family: verdana; font-size: 30pt; color:rgb(240, 240, 240);">
            <div class="loader">
                <b>Realizando modificaciones<span>.</span> <span>.</span> <span>.</span> </b>
            </div>
        </div>
        <video 
            src="multimedia/light_-_121257 (1080p).mp4" autoplay="true" 
            muted="true" 
            loop="true" >
        </video>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <!-- //////////////////////////////////////////Area de UNINAV//////////////////////////////////////////////////// -->
                            <div class="row fondo-UNINAV">
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
                            <div class="row fondo-menu">
                                <!-- /////////////////////////  Alinea el contenido del menu a la derecha //////////////////-->
                                <form class="d-flex justify-content-center">
                                    <!-- /////////////////////////  Poner la imagen del logo de base de datos //////////////////-->
                                    <div>
                                        <img src="images/Base de datos.png" class="img-base">
                                    </div>
                                    <!-- /////////////////////////  Llama al menu de boostrap en linea//////////////////-->
                                    <nav class="navbar justify-content-center navbar-expand-lg bg-body-tertiary fondo-opciones">
                                        <!-- /////////////////////////   //////////////////-->
                                        <div class="container-fluid">
                                            <!-- /////////////////////////  Zona del boton tipo dispositivos moviles  //////////////////-->
                                            <button class="navbar-toggler" type="button" style="color: aqua; text-align: center;"
                                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                                                    aria-controls="navbarSupportedContent" 
                                                    aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon" style="color: white;"><img src="menuH.png" width="30px"/></span>
                                            </button>

                                            <?php
                                                $bd="";
                                                if(isset($_SESSION['User'])&&isset($_SESSION['Pass'])){
                                                    $user = $_SESSION['User'];
                                                    $pass = $_SESSION['Pass'];
                                                    $rol = $_SESSION['RolUser'];
                                                    $_SESSION['Users']=$user;
                                                    if(isset($_GET['BaseDatos'])){
                                                        $bd=$_GET['BaseDatos'];
                                                        $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$bd.';charset=utf8', 'root', '1234');
                                                        $query2 = "UPDATE usuario SET usuario.EstadoUsuario=1 WHERE usuario.nombreUsuario=\"" . $user . "\" AND usuario.Password=\"" . $pass . "\";";
                                                        $conexion->exec($query2);
                                                    }

                                                    
                                                }else{
                                                    echo "<h2>USUARIO NO ESPECIFICADO</h2>";
                                                }
                                                
                                            ?>
                                            <!-- ///////////////////////// Inicia el contenido del menu  //////////////////-->
                                            <div class="collapse navbar-collapse nav justify-content-end" id="navbarSupportedContent">
                                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                                                    <li class="nav-item" >
                                                        <!-- /////////////////////////  Da colores y personalizacion a las letras de Incio//////////////////-->
                                                        <a class="nav-link active estil-letras" 
                                                           aria-current="page" style="cursor: pointer;" onclick="verInicio()">Inicio</a>
                                                    </li>
                                                    <!-- /////////////////////////  Realiza el menu desplegable //////////////////-->
                                                    <li class="nav-item dropdown">
                                                        <!-- /////////////////////////  Da colores y personalizacion a las letras de Datos//////////////////-->
                                                        <a class="nav-link dropdown-toggle estil-letras"
                                                           role="button" data-bs-toggle="dropdown" 

                                                           aria-expanded="false">
                                                            Datos
                                                        </a>
                                                        <!-- /////////////////////////  Edicion de sub menu de Datos //////////////////-->
                                                        <!-- /////////////////////////  Da colores y personalizacion a las letras //////////////////-->
                                                        <ul class="dropdown-menu letras-menu">
                                                            <li><a class="dropdown-item" style="cursor: pointer;" onclick="verM()">Modificar/Eliminar</a></li>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" style="cursor: pointer;" onclick="verA()">Agregar Informacion</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- /////////////////////////  Realiza el menu desplegable de Usuario//////////////////-->
                                                    <li class="nav-item dropdown">
                                                        <!-- /////////////////////////  Da colores y personalizacion a las letras //////////////////-->
                                                        <a class="nav-link dropdown-toggle estil-letras"  
                                                           role="button" data-bs-toggle="dropdown"
                                                           aria-expanded="false">
                                                            Usuario
                                                        </a>
                                                        <!-- /////////////////////////  Edicion de sub menu de Datos //////////////////-->
                                                        <!-- /////////////////////////  Da colores y personalizacion a las letras //////////////////-->
                                                        <ul class="dropdown-menu letras-menu">
                                                            <li><a class="dropdown-item" style="cursor: pointer;" onclick="verP()">Cuenta</a></li>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                                <?php
                                                                if(isset($_SESSION['RolUser']) && $_SESSION['RolUser'] == "root") {
                                                                        echo "<li><a class=\"dropdown-item\" style=\"cursor: pointer;\" onclick=\"verAP()\" color:white;>Agregar Usuario</a></li>";
                                                                    }
                                                                ?>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='servlets/CerrarSesion.php?BaseDatos='+sacarBD();">Cerrar Sesiòn</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </form>
                            </div>

                            <!-- ////////////////////////////////////////// Boton desplegable//////////////////////////////////////////////////// -->
                            <div class="row justify-content-center color-letras-perf sangria">
                                <main>
                                    <div class="container mt-5 " style="padding:3pt;">
                                        <h1><b>Perfil</b></h1><br><br>
                                        <div class="card fondo-perfil">
                                            <center>
                                            <form>
                                                <table>
                                                    <center>
                                                        <th>
                                                            <br><p style="color: rgb(161, 233, 215); font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de usuario: </p>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $user ?>" name="USER"/></td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Modificar" onclick="modificarNombreUser()"/></td>
                                                        </th>
                                                    </center>
                                                </table>

                                                <table>
                                                    <center>
                                                        <th>
                                                            <p style="color: rgb(161, 233, 215); font-size: 18px;"><b>&nbsp;&nbsp;&nbsp;Rol de usuario:&nbsp;&nbsp;&nbsp;</b></p>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $rol ?>" name="ROL" disabled/></td>
                                                        <td>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        </th>
                                                    </center>            
                                                </table>

                                                <table>
                                                    <center>
                                                        <th>
                                                            <p style="color: rgb(161, 233, 215); font-size: 18px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contraseña:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></p>
                                                        <td><input type="password" value="<?php echo $pass ?>" name="PASS" id="password"/></td>
                                                        <td>
                                                            <table>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img id="eyeIcon" src="ojo.png" onclick="mostrarPassword()" width="20px" onclick="mostrarPassword()" style ="cursor: pointer;"></td>
                                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Modificar" onclick="modificarPasswordUser()" /></td>
                                                            </table>
                                                        </td>
                                                        </th>  
                                                    </center>       
                                                </table>
                                            </form>
                                            </center>
                                        </div>
                                    </div>
                                    <br>

                                </main>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //////////////////////////////////////////Zona del footer//////////////////////////////////////////////////// -->
                <footer class="pie">
                    <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                        <p>&copy; 2024. Universidad Naval</p>
                        <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                        <img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid">
                    </div>
                </footer>
            </div>

            <script>
                function verInicio() {
                    var db = sacarBD();
                    IrInicio(db);
                }

                function IrInicio(baseDatos) {
                    window.location.href = 'PagPrincipal.php?BaseDatos=' + baseDatos;
                }


            </script>

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
