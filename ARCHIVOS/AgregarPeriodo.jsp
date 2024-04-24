<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*" %>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Periodos | Base de datos UNINAV</title>
        <link rel="shortcut icon" href="uninav.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="8.1 style.agreg.per.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="DinamicaVentanas.js"></script>
        <script src="ModificarPerfil.js"></script>
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
                                            <button class="navbar-toggler" type="button" style="color: aqua; text-align: center;"
                                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                                                    aria-controls="navbarSupportedContent" 
                                                    aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon" style="color: white;"><img src="menuH.png" width="30px"/></span>
                                            </button>

                                            <%
                                                String baseDatos = (String) request.getParameter("BaseDatos");
                                                System.out.println("BD: " + baseDatos);
                                            %>
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
                                                                <%
                                                                    String rol = (String) session.getAttribute("RolUser");
                                                                    if (rol.equals("root")) {
                                                                        out.println("<li><a class=\"dropdown-item\" style=\"cursor: pointer;\" onclick=\"verAP()\" color:white;>Agregar Usuario</a></li>");
                                                                    }
                                                                %>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" style="cursor: pointer;" onclick="sesionC()">Cerrar Sesiòn</a></li>
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
                                        <select class="custom-select fondo-submenu boton-desplegable 
                                                letras-boton " 
                                                id="inputGroupSelect02" name="combo" method="post">
                                            <option value="Select">Seleccione un Establecimiento Educativo Naval</option>
                                            <%
                                                String opc = request.getParameter("combo");
                                                System.out.println(opc);
                                                String[] options = {"ESEM", "IOG", "CECANOP", "CECANOG", "CECACIPA", "CECACIGO",
                                                    "ESBUSREB", "ESCMAQNAV", "CENCAVELA", "CESISCCAM", "CENCASANT",
                                                    "CECAISMAR", "CENCAPETRIV", "ESMECAVNAV", "CADAVAM", "CENCAEIM",
                                                    "CENAREG-ANF", "CENAREG-3", "CENAREG-4", "CENAREG-6", "CENAREG-8",
                                                    "CENAREG-9", "CENAREG-10", "CENAREG-16"};
                                                for (String option : options) {
                                                    out.println("<option value=\"" + option + "\"" + (option.equals(opc) ? " selected" : "") + ">" + option + "</option>");
                                                }
                                            %>
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
                            <%
                                String opc2 = request.getParameter("comboC");
                                if (opc != null && !opc.equals("Select")) {

                            %>
                            <center>
                                <p style="font-size:20pt; color:white;"><b>____________________________________________________________________________________</b></p>
                                <div class="row justify-content-center aj-list">
                                    <div class="formulario" style="text-align-all: center;">

                                        <form class="color-form" method="POST" onsubmit="subirBDP(event)" >
                                            <div class=" col 12">
                                                <div class="input-group mb-3">
                                                    <select class="form-select fondo-list letras-menu alin-letras" style="font-size: 14pt;" id="comboC" name="comboC" required>
                                                        <option value="Select">Seleccione un curso</option>
                                                        <%  try {
                                                                Class.forName("com.mysql.jdbc.Driver");
                                                                Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/" + baseDatos + "?serverTimezone=UTC", "root", "1234");
                                                                Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                                                                String query = "SELECT curso.IDCurso,curso.NombreCurso FROM curso WHERE Escuela='" + opc + "';";
                                                                ResultSet rs = consulta.executeQuery(query);
                                                                ResultSetMetaData rsmd = rs.getMetaData();
                                                                int columnCount = rsmd.getColumnCount();
                                                                while (rs.next()) {
                                                                    out.println("<option value=\"" + rs.getString(1) + "\">" + rs.getString(2) + "</option>");
                                                                }
                                                        %>
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
                                            <button class="btnCloud marg-entre">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" class="icon"><path d="M22,15.04C22,17.23 20.24,19 18.07,19H5.93C3.76,19 2,17.23 2,15.04C2,13.07 3.43,11.44 5.31,11.14C5.28,11 5.27,10.86 5.27,10.71C5.27,9.33 6.38,8.2 7.76,8.2C8.37,8.2 8.94,8.43 9.37,8.8C10.14,7.05 11.13,5.44 13.91,5.44C17.28,5.44 18.87,8.06 18.87,10.83C18.87,10.94 18.87,11.06 18.86,11.17C20.65,11.54 22,13.13 22,15.04Z"></path></svg>
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </center>



                            <%
                                } catch (SQLException ex) {
                                    out.println("Se produjo una excepción durante la conexión:" + ex);
                                } catch (Exception ex) {
                                    out.println("Se produjo una excepción:" + ex);
                                }
                            } else if (opc != null && opc.equals("Select")) {
                            %> 

                            <div class="row table-responsive" style="text-align: right; margin-top: 50px;">
                                <form class="esp-arr" onsubmit="Excel2(event)" method="post" enctype="multipart/form-data">
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
                                                            <input type="submit" class="bn633-hover bn19" id="botonCombo" name="boton" value="Guardar información"/>
                                                        </div>    
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <%
                            } else {
                            %>
                            <div class="row table-responsive" style="text-align: right; margin-top: 50px;">
                                <form class="esp-arr" onsubmit="Excel2(event)" method="post" enctype="multipart/form-data">
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
                                                            <input type="submit" class="bn633-hover bn19" id="botonCombo" name="boton" value="Guardar información"/>
                                                        </div>    
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <%
                                }
                            %>


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

                </body>
                </html>
