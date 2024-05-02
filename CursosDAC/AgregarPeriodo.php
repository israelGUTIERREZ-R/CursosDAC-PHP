<?php
    session_start();
    $selectedOption = isset($_REQUEST['combo']) ? $_REQUEST['combo'] : 'Select';
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Periodos | Base de datos UNINAV</title>
        <link rel="shortcut icon" href="uninav.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="CSS/8.1 style.agreg.per.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/bootstrap4.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha512-Ua/7Woz9L5O0cwB/aYexmgoaD7lw3dWe9FvXejVdgqu71gRog3oJgjSWQR55fwWx+WKuk8cl7UwA1RS6QCadFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/DinamicaVentanas.js"></script>
        <script src="JS/ModificarPerfil.js"></script>
    </head>
    <body>
        <div id="loadingMessage" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(35, 35, 35,0.8);
             z-index: 9999; text-align: center; padding-top: 20%; font-family: verdana; font-size: 30pt; color:rgb(240, 240, 240);">
            <div class="loader">
                <b>Guardando información<span>.</span> <span>.</span> <span>.</span> </b>
            </div>
        </div>
        <video 
            src="multimedia/light_-_121257 (1080p).mp4" autoplay="true" 
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
                            <!-- //////////////////////////////////////////Area del menu //////////////////////////////////////////////////// -->
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
                                                           aria-current="page" style="cursor: pointer;" onclick="verI()">Inicio</a>
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
                            <div class="row justify-content-center">
                                <div class="input-group mb-3 ajust-select">
                                    <form method="POST">
                                    <select class="custom-select boton-desplegable" 
                                            id="inputGroupSelect02" name="combo" method="post">
                                                <option value="Select" <?php echo ($selectedOption == 'Select') ? 'selected' : ''; ?>>Seleccione un Establecimiento Educativo Naval</option>
                                            <option value="ESEM" <?php echo ($selectedOption == 'ESEM') ? 'selected' : ''; ?>>ESEM</option>
                                            <option value="IOG" <?php echo ($selectedOption == 'IOG') ? 'selected' : ''; ?>>IOG</option>
                                            <option value="CECANOP" <?php echo ($selectedOption == 'CECANOP') ? 'selected' : ''; ?>>CECANOP</option>
                                            <option value="CECANOG" <?php echo ($selectedOption == 'CECANOG') ? 'selected' : ''; ?>>CECANOG</option>
                                            <option value="CECACIPA" <?php echo ($selectedOption == 'CECACIPA') ? 'selected' : ''; ?>>CECACIPA</option>
                                            <option value="CECACIGO" <?php echo ($selectedOption == 'CECACIGO') ? 'selected' : ''; ?>>CECACIGO</option>
                                            <option value="ESBUSREB" <?php echo ($selectedOption == 'ESBUSREB') ? 'selected' : ''; ?>>ESBUSREB</option>
                                            <option value="ESCMAQNAV" <?php echo ($selectedOption == 'ESCMAQNAV') ? 'selected' : ''; ?>>ESCMAQNAV</option>
                                            <option value="CENCAVELA" <?php echo ($selectedOption == 'CENCAVELA') ? 'selected' : ''; ?>>CENCAVELA</option>
                                            <option value="CESISCCAM" <?php echo ($selectedOption == 'CESISCCAM') ? 'selected' : ''; ?>>CESISCCAM</option>
                                            <option value="CENCASANT" <?php echo ($selectedOption == 'CENCASANT') ? 'selected' : ''; ?>>CENCASANT</option>
                                            <option value="CECAISMAR" <?php echo ($selectedOption == 'CECAISMAR') ? 'selected' : ''; ?>>CECAISMAR</option>
                                            <option value="CENCAPETRIV" <?php echo ($selectedOption == 'CENCAPETRIV') ? 'selected' : ''; ?>>CENCAPETRIV</option>
                                            <option value="ESMECAVNAV" <?php echo ($selectedOption == 'ESMECAVNAV') ? 'selected' : ''; ?>>ESMECAVNAV</option>
                                            <option value="CADAVAM" <?php echo ($selectedOption == 'CADAVAM') ? 'selected' : ''; ?>>CADAVAM</option>
                                            <option value="CENCAEIM" <?php echo ($selectedOption == 'CENCAEIM') ? 'selected' : ''; ?>>CENCAEIM</option>
                                            <option value="CENAREG-ANF" <?php echo ($selectedOption == 'CENAREG-ANF') ? 'selected' : ''; ?>>CENAREG-ANF</option>
                                            <option value="CENAREG-3" <?php echo ($selectedOption == 'CENAREG-3') ? 'selected' : ''; ?>>CENAREG-3</option>
                                            <option value="CENAREG-4" <?php echo ($selectedOption == 'CENAREG-4') ? 'selected' : ''; ?>>CENAREG-4</option>
                                            <option value="CENAREG-6" <?php echo ($selectedOption == 'CENAREG-6') ? 'selected' : ''; ?>>CENAREG-6</option>
                                            <option value="CENAREG-8" <?php echo ($selectedOption == 'CENAREG-8') ? 'selected' : ''; ?>>CENAREG-8</option>
                                            <option value="CENAREG-9" <?php echo ($selectedOption == 'CENAREG-9') ? 'selected' : ''; ?>>CENAREG-9</option>
                                            <option value="CENAREG-10" <?php echo ($selectedOption == 'CENAREG-10') ? 'selected' : ''; ?>>CENAREG-10</option>
                                            <option value="CENAREG-16" <?php echo ($selectedOption == 'CENAREG-16') ? 'selected' : ''; ?>>CENAREG-16</option>
                                        </select>

                                </div>
                            </div>
                            <!-- //////////////////////////////////////////////////  Boton formulario /////////////////////////////////-->
                            <div class="row justify-content-center">
                                <div class="row justify-content-center">
                                    <input class="boton-select" type="submit" id="botonCombo" name="boton" value="SELECCIONAR" style="color:white;" />
                                </div>
                            </div>
                            </form>
                            <?php
                                 if(isset($_REQUEST['combo'])){
                                    $opc = $_REQUEST['combo'];
                                    if ($opc != null && $opc!=("Select")){
                                            $opc=$_REQUEST['combo'];
                            ?>
                            <center>
                                <p style="font-size:20pt; color:white;"><b>____________________________________________________________________________________</b></p>
                                <div class="row justify-content-center aj-list">
                                    <div class="formulario" style="text-align: center;">

                                        <form class="color-form" method="POST" onsubmit="subirBDP(event)" >
                                            <div class=" col 12">
                                                <div class="input-group mb-3">
                                                    <select class="form-select fondo-list letras-menu alin-letras" style="font-size: 14pt;" id="comboC" name="comboC" required>
                                                        <option value="Select">Seleccione un curso</option>
                                                        <?php
                                                            $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$_GET['BaseDatos'].';charset=utf8', 'root', '1234');
                                                            $query2 = "SELECT IDCurso, NombreCurso FROM curso WHERE curso.Escuela='" . $opc . "';";
                                                            $rs=$conexion->query($query2);
                                                            while ($row = $rs->fetch(PDO::FETCH_ASSOC)){
                                                                ?>
                                                                <option value="<?php echo $row['IDCurso'] ?>"><?php echo $row['NombreCurso'] ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="text-align: left;">
                                                <label for="nombre" class="letras-boton" class="letras-boton">Numero de periodo: &nbsp; </label>
                                                <input style="color: white;"  type="number" min="1" id="per" name="per" required class="bordes-form">
                                                <br>
                                                <label class="marg-entre letras-boton" for="nombre">Fecha de inicio:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;   </label>
                                                <input style="color: white;"  type="text" id="fechaIn" name="fechaIn" placeholder="aaaa-mm-dd" required class="bordes-form largo-date">
                                                <br>
                                                <label class="marg-entre letras-boton" for="nombre">Fecha de finalizaciòn: </label>
                                                <input style="color: white;"  type="text" id="fechaFn" name="fechaFn" placeholder="aaaa-mm-dd" required class="bordes-form largo-date">
                                                <br>
                                            </div>
                                            <label  class="marg-entre letras-boton" for="nombre">Cantidad de ingresos:</label>
                                            <input style="color: white;"  type="number" min="1" id="ingresos" name="ingresos" required class="bordes-form">
                                            <br>
                                            <label  class="marg-entre letras-boton" for="nombre">Cantidad de egresos:</label>
                                            <input style="color: white;" type="number" id="egresos" min="1" name="egresos" required class="bordes-form">
                                            <div>
                                            <div class="col-12 al-bott">
                                                            <input type="submit" class="bn633-hover bn19" id="botonCombo" name="boton" value="Guardar información"/>
                                                        </div>

                                        </form>

                                    </div>
                                </div>
                            </center>

                            <?php

                            } elseif ($opc != null && $opc==("Select")) {
                            ?> 

                            <div class="row table-responsive" style="text-align: right; margin-top: 50px;">
                                <form class="esp-arr" method="post" enctype="multipart/form-data">
                                    <table style="width: 30%;" class="esp-der">
                                        <tbody>
                                            <tr>
                                                <th class="color-tablaeimagen fondo-bienv"> 
                                                    <div class="col mb-3 margen-entre">
                                                        <p class="letras-PDF">Elegir archivo de registro (CSV): </p>
                                                        <div class="col">
                                                            <img src="images/excel.png" class="excel">
                                                        </div>
                                                        <input class="form-control fondo-archivos margenes-deco" type="file" id="file" name="file" accept=".csv" required>
                                                        <!-- ////////////////////////////////////////////////// Boton guardar curso  /////////////////////////////////-->
                                                        <div class="col-12 al-bott">
                                                            <input type="submit" class="bn633-hover bn19" id="botonCombo" name="boton" value="Guardar información" onclick="Excel2(event)"/>
                                                        </div>    
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <?php
                            }

                        }else{
                            ?>
                            <div class="row table-responsive" style="text-align: right; margin-top: 50px;">
                                <form class="esp-arr" method="post" enctype="multipart/form-data">
                                    <table style="width: 30%;" class="esp-der">
                                        <tbody>
                                            <tr>
                                                <th class="color-tablaeimagen fondo-bienv"> 
                                                    <div class="col mb-3 margen-entre">
                                                        <p class="letras-PDF">Elegir archivo de registro (CSV): </p>
                                                        <div class="col">
                                                            <img src="images/excel.png" class="excel">
                                                        </div>
                                                        <input class="form-control fondo-archivos margenes-deco" type="file" id="file2" name="file" accept=".csv" required>
                                                        <!-- ////////////////////////////////////////////////// Boton guardar curso  /////////////////////////////////-->
                                                        <div class="col-12 al-bott">
                                                            <input type="submit" class="bn633-hover bn19" id="botonCombo" name="boton" value="Guardar información" onclick="Excel2(event)"/>
                                                        </div>    
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <?php

                        }
                            ?>


                        </div>
                    </div>
                </div>
                <!-- //////////////////////////////////////////Zona del footer//////////////////////////////////////////////////// -->

                <footer class="pie">
                    <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                        <p><br><br><br><br>&copy; 2024. Universidad Naval</p>
                        <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                        <img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid">
                    </div>
                </footer>
                <!-- //////////////////////////////////////////Links de formarto bootstrap//////////////////////////////////////////////////// -->
                <script>
            window.addEventListener('beforeunload', function (event) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'actualizar_estado_usuario.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send();
            });
        </script>
                </body>
                </html>
