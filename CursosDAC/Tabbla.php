<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados | Base de datos UNINAV</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="CSS/0.444 style.tablas-second.css">
        <link rel="shortcut icon" href="uninav.png">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/bootstrap4.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha512-Ua/7Woz9L5O0cwB/aYexmgoaD7lw3dWe9FvXejVdgqu71gRog3oJgjSWQR55fwWx+WKuk8cl7UwA1RS6QCadFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/DinamicaVentanas.js"></script>
    </head>
    <body>
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
                            <div class="row fondo-SEMAR">
                                <h1 class="colorsemar">
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;  
                                    SEMAR
                                </h1>
                            </div>
                            <div class="row fondo-menu">
                                <form class="d-flex justify-content-center">
                                    <div>
                                        <img src="images/Base de datos.png" class="img-base">
                                    </div>
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
                                                           aria-current="page" onclick="verI()">Inicio</a>
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
                                                            <li><a class="dropdown-item" onclick="verM()">Modificar/Eliminar</a></li>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" onclick="verA()">Agregar Informacion</a></li>
                                                        </ul>
                                                    </li>
                                                    <!-- /////////////////////////  Realiza el menu desplegable de Usuario//////////////////-->
                                                    <li class="nav-item dropdown">
                                                        <!-- /////////////////////////  Da colores y personalizacion a las letras //////////////////-->
                                                        <a class="nav-link dropdown-toggle estil-letras" href="#" 
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
                            <div class="row justify-content-center">
                                <div class="input-group mb-3 ajust-select fondo">
                                <select class="custom-select boton-desplegable" 
                                            id="inputGroupSelect02" name="combo" method="post">
                                        <option value="Select">Seleccione un Establecimiento Educativo Naval</option>
                                        <option value="ESEM">ESEM</option>
                                        <option value="IOG">IOG</option>
                                        <option value="CECANOP">CECANOP</option>
                                        <option value="CECANOG">CECANOG</option>
                                        <option value="CECACIPA">CECACIPA</option>
                                        <option value="CECACIGO">CECACIGO</option>
                                        <option value="ESBUSREB">ESBUSREB</option>
                                        <option value="ESCMAQNAV">ESCMAQNAV</option>
                                        <option value="CENCAVELA">CENCAVELA</option>
                                        <option value="CESISCCAM">CESISCCAM</option>
                                        <option value="CENCASANT">CENCASANT</option>
                                        <option value="CECAISMAR">CECAISMAR</option>
                                        <option value="CENCAPETRIV">CENCAPETRIV</option>
                                        <option value="ESMECAVNAV">ESMECAVNAV</option>
                                        <option value="CADAVAM">CADAVAM</option>
                                        <option value="CENCAEIM">CENCAEIM</option>
                                        <option value="CENAREG-ANF">CENAREG-ANF</option>
                                        <option value="CENAREG-3">CENAREG-3</option>
                                        <option value="CENAREG-4">CENAREG-4</option>
                                        <option value="CENAREG-6">CENAREG-6</option>
                                        <option value="CENAREG-8">CENAREG-8</option>
                                        <option value="CENAREG-9">CENAREG-9</option>
                                        <option value="CENAREG-10">CENAREG-10</option>
                                        <option value="CENAREG-16">CENAREG-16</option>
                                    </select>
                                </div>
                            </div>
                            <!-- //////////////////////////////////////////////////  Boton para llamar a la tabla /////////////////////////////////-->
                            <div class="row justify-content-center">
                                <button class="boton-select"><a class="letras-bot-select" onclick="verTabla()">Seleccionar</a></button>
                            </div>
                            <!-- //////////////////////////////////////////////////   /////////////////////////////////-->
                            <br><br><div class="row justify-content-center"><center>
                                <table class="table-hover fondo-tabla">
                                    <?php
                                         if(isset($_GET['combo'])){
                                            $opc=$_GET['combo'];
                                            $totalElementosIngresados = 0;
                                            $totalElementosEgresados = 0;
                                                $conexion = new PDO('mysql:host=127.0.0.1;dbname='.$bd.';charset=utf8', 'root', '1234');
                                                $query2 = "SELECT curso.NombreCurso AS \"Nombre de Curso\", periodo.FechaInicio AS \"Fecha de inicio\", "
                                                . "periodo.FechaFin AS \"Fecha de finalización\", periodo.Ingresos AS \"Cantidad Ingresos\", "
                                                . "periodo.Egresos AS \"Cantidad Egresos\", curso.Registro AS \"Registro\" FROM escuela JOIN curso ON "
                                                . "escuela.Siglas=curso.Escuela JOIN periodo ON curso.IDCurso=periodo.IDCurso WHERE escuela.Siglas=\""
                                                . $_GET['combo'] . "\" ORDER BY MONTH(fechaInicio);";
                                                $nombre=$conexion->query("SELECT nombre FROM escuela WHERE siglas=\"" . $opc . "\";");
                                                $rs=$conexion->query($query2);
                                                echo "<div class=\"table-responsive\">";
                                                while($row = $nombre->fetch(PDO::FETCH_ASSOC)){
                                                    echo "<center><h3 style=\"background-color: rgba(168, 218, 254,0.25); color: white;\">" . ($opc . " - " . $row['nombre']) . "</h3></center>";
                                                }
                                                echo "<tr>";
                                                $columnCount = $rs->columnCount();
                                                for ($i = 0; $i <= $columnCount; $i++){
                                                    $columnMeta = $rs->getColumnMeta($i);
                                                    if (is_array($columnMeta) && isset($columnMeta['name'])){
                                                        $columnName = $columnMeta['name'];
                                                         echo "<th>".$columnName."</th>";
                                                    }
                                                   
                                                }
                                                echo "</tr>";
                                                $j = 1;
                                                while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<tr>";
                                                    for ($i = 0; $i < $columnCount; $i++) {
                                                        $columnName = $rs->getColumnMeta($i)['name'];
                                                        $columnValue = $row[$columnName];
                                                        if (isset($columnName)){
                                                            if ($columnName != "Registro") {
                                                                echo "<td>$columnValue</td>";
                                                            } else {
                                                                $EEN = $_GET['combo'];
                                                                $baseDatos = $_GET['BaseDatos'];
                                                                echo "<td><a href=\"./servlets/pdf_Registro.php?EEN=$EEN&curso={$row['Nombre de Curso']}&BaseDatos=$baseDatos\" style=\"color: rgb(10, 37, 67);\">Registro.pdf</a></td>";
                                                            }
                                                        }
                                                        
                                                    }
                                                    ?>
                                                    <td>
                                        <button type="button" id="boton<?php echo $j?>" onclick="clic('<?php echo $row['Cantidad Ingresos']?>', '<?php echo $row['Cantidad Egresos']?>',
                        '<?php echo $row['Nombre de Curso']?>', '<?php echo $row['Fecha de inicio']?>', '<?php echo $row['Fecha de finalización']?>')" style="font-size: 12pt;">
                                            <b>Ver gráficas</b>
                                        </button>
                                    </td>

                                                    <?php
                                                    echo "</tr>";

                                    ?>
                                    <?php
                                            echo  "</tr>";
                                            $totalElementosIngresados+=$row['Cantidad Ingresos'];
                                            $totalElementosEgresados+=$row['Cantidad Egresos'];
                                            $j++;
                                        }
                                    }

                                        ?>
                                    
                                </table>
                                    <div style="font-family: verdana; font-size: 14pt; color:white">
                                        <br><p style="font-family: verdana; font-size: 14pt;"></p><center><b>CANTIDAD DE CURSOS: </b><?php echo ($j - 1)?></center>
                                        <p id="numeros"><center><b>CANTIDAD DE ELEMENTOS INGRESADOS: </b><?php echo $totalElementosIngresados?></center></p>
                                        <p id="numeros"><center><b>CANTIDAD DE ELEMENTOS EGRESADOS: </b><?php echo $totalElementosEgresados?></center></p>
                                    </div>
                                    <?php
                                            echo "</div>";
                                    ?>

                                    </center>      
                            </div>

                        </div>
                    </div>
                </div>
                
                <br><br><br>
                <footer class="pie">
                <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                    <p><br><br>&copy; 2024. Universidad Naval</p>
                    <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                    <img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid">
                </div>
                </footer>
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