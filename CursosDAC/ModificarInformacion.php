<?php
    session_start();
    $selectedOption = isset($_REQUEST['combo']) ? $_REQUEST['combo'] : 'Select';
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar Información | Base de datos UNINAV</title>
        <link rel="shortcut icon" href="uninav.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="CSS/0.444 style.tablas-second.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="CSS/bootstrap4.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha512-Ua/7Woz9L5O0cwB/aYexmgoaD7lw3dWe9FvXejVdgqu71gRog3oJgjSWQR55fwWx+WKuk8cl7UwA1RS6QCadFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/UpdateDelete.js"></script>
        <script src="JS/DinamicaVentanas.js"></script>
    </head>

    <body>
        <div id="loadingMessage" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(35, 35, 35,0.8);
             z-index: 9999; text-align: center; padding-top: 20%; font-family: verdana; font-size: 30pt; color:rgb(240, 240, 240);">
            <div class="loader">
                <b>Guardando cambios<span>.</span> <span>.</span> <span>.</span> </b>
            </div>
        </div>
        <!-- //////////////////////////////////////////Video de fondo //////////////////////////////////////////////////// -->
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
                                                            <br><br><br>
                            <!-- ////////////////////////////////////////// Boton desplegable//////////////////////////////////////////////////// -->

                            <?php
                                $j = 1;
                                if ($rol==("Invited")) {
                                    echo "<br><br><br><br><h3>No puede modificar ni eliminar datos porque no tiene los privilegios necesarios</h3>";
                                } else {
                            ?>
                            <form method="post">
                                <div class="row justify-content-center">
                                    <div class="input-group mb-3 ajust-select fondo">

                                        <select class="custom-select boton-desplegable" id="inputGroupSelect02" name="combo" method="post">
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

                                <div class="row justify-content-center">
                                    <button class="btn btn-outline-info boton-select" ><a class="letras-bot-select" name="boton">
                                        Seleccionar</a></button>

                                </div>
                            </form>
                            <!-- //////////////////////////////////////////////////   /////////////////////////////////-->
                        </div>
                    </div>
                    <!-- //////////////////////////////////////////////////  Boton para llamar a la tabla /////////////////////////////////-->

                    <?php
                        if(isset($_REQUEST['combo'])){
                            $opc = $_REQUEST['combo'];
                            if ($opc != null) {
                                if ($opc!=("Select")) {
                                    if(isset($_REQUEST['combo'])){
                                        $opc=$_REQUEST['combo'];
                                        $bd=$_GET['BaseDatos'];
                                        $totalElementosIngresados = 0;
                                        $totalElementosEgresados = 0;
                                            $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$_GET['BaseDatos'].';charset=utf8', 'root', '1234');
                                            $query2 = "SELECT curso.NombreCurso AS \"Nombre de Curso\", periodo.FechaInicio AS \"Fecha de inicio\", "
                                            . "periodo.FechaFin AS \"Fecha de finalización\", periodo.Ingresos AS \"Cantidad Ingresos\", "
                                            . "periodo.Egresos AS \"Cantidad Egresos\",periodo.NumeroPeriodo AS \"Número de Periodo\" FROM escuela JOIN curso ON escuela.Siglas=curso.Escuela "
                                            . "JOIN periodo ON curso.IDCurso=periodo.IDCurso WHERE escuela.Siglas=\"". $_REQUEST['combo'] . "\" ORDER BY MONTH(fechaInicio);";
                                            $rs=$conexion->query($query2);
                                            $columnCount = $rs->columnCount();
                                        echo "<form method=\"POST\">";
                                        echo "<div><center><table class=\"table-hover fondo-tabla\"><tr>";
                                        $columnCount = $rs->columnCount();
                                        for ($i = 0; $i <= $columnCount; $i++){
                                            $columnMeta = $rs->getColumnMeta($i);
                                            if (is_array($columnMeta) && isset($columnMeta['name'])){
                                                $columnName = $columnMeta['name'];
                                                 echo "<th>".$columnName."</th>";
                                            }
                                           
                                        }
                                        echo "</tr>";
                                        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            for ($i = 0; $i < $columnCount; $i++) {
                                                $columnName = $rs->getColumnMeta($i)['name'];
                                                $columnValue = $row[$columnName];
                                                if (isset($columnName)){
                                                    if ($i ==0) {
                                                        echo "<td><input name='caja" . intval($i+1) . "' value='" . $columnValue . "' onload='caja1(" . $j . ")' disabled></td>";
                                                    } elseif ($i == 1) {
                                                        echo "<td><input name='caja" . intval($i+1) . "' value='" . $columnValue . "' onload='caja1(" . $j . ")' disabled></td>";
                                                    } elseif ($i == 5) {
                                                        echo "<td><input name='caja" . intval($i+1) . "' value='" . $columnValue . "' onload='caja1(" . $j . ")' disabled></td>";
                                                    } else {
                                                        echo "<td><input name='caja" . intval($i+1) . "' value='" . $columnValue . "'></td>";
                                                    }
                                                }
                                                
                                                
                                            }
                                            ?>
                                                 <td><input type="button" onclick="modificarBaseDeDatos(<?php echo $j ?>);" id="boton<?php echo $j ?>" style="font-size: 12pt;" value="Modificar"></input></td>
                    <td><input type="button" onclick="eliminarBaseDeDatos(<?php echo $j ?>);" id="boton<?php echo $j ?>" style="font-size: 12pt;" value="Eliminar"></input></td>


                                                <?php
                                                $j++;
                        }
                        
                    ?>
                   

                    <?php
                    
                                            echo"</tr>";
                                            
                                        }
                                        echo "</table>";
                                        echo "<br>";
                                        echo "</div></center>";
                                        echo "</form>";
                                    
                                }
                            }

                            }
                        }

                    ?>

                    <script>
                        window.onload = function () {
                            var numRows = <?php echo ($j - 1) ?>; // Assuming j is the total number of rows
                            for (var row = 1; row <= numRows; row++) {
                                caja1(row);
                            }
                        };

                        
                    </script>
                    <!-- ////////////////////////////////////////////////// <button type="button" class="btn btn-primary"><i class="fa fa-user"></i> Botón</button> /////////////////////////////////-->
                </div>
            </div>
        </div>



        <!-- //////////////////////////////////////////Zona del footer//////////////////////////////////////////////////// -->
        <br>
                <footer class="pie">
                <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                    <p><br><br>&copy; 2024. Universidad Naval</p>
                    <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                    <img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid">
                </div>
                </footer>
</div>
<!-- //////////////////////////////////////////Links de formarto bootstrap//////////////////////////////////////////////////// -->

</body>
</html>
