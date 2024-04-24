<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultados | Base de datos UNINAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="0.444 style.tablas-second.css">
        <link rel="shortcut icon" href="uninav.png">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="DinamicaVentanas.js"></script>
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

                                            <%
                                                String baseDatos = (String) request.getParameter("BaseDatos");
                                                System.out.println("BD: " + baseDatos);
                                                String escuela = (String) request.getParameter("combo");
                                                System.out.println("BD: " + baseDatos);
                                            %>
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
                                                            <li><a class="dropdown-item" onclick="verP()">Cuenta</a></li>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                                <%
                                                                    String rol = (String) session.getAttribute("RolUser");
                                                                    if (rol.equals("root")) {
                                                                        out.println("<li><a class=\"dropdown-item\" onclick=\"verAP()\" color:white;>Agregar Usuario</a></li>");
                                                                    }
                                                                %>
                                                            <li><hr style="border-color: aqua;" class="dropdown-divider"></li>
                                                            <li><a class="dropdown-item" onclick="sesionC()">Cerrar Sesiòn</a></li>
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
                                    <select class="custom-select fondo-submenu boton-desplegable 
                                            letras-boton " 
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
                                    <%@page import="java.sql.*" %>
                                    <%
                                        String opc = (String) session.getAttribute("combo");
                                        String user = (String) session.getAttribute("User");
                                        if (baseDatos != null) {
                                            session.setAttribute("BaseDatos", baseDatos);
                                        }
                                        session.setAttribute("Roles", rol);
                                        session.setAttribute("Users", user);
                                        int totalElementosIngresados = 0, totalElementosEgresados = 0;
                                        if (opc != null) {
                                            if (opc.equals("Select")) {
                                                response.sendRedirect("PagPrincipal.jsp");
                                            } else {
                                                session.setAttribute("escuela", opc);

                                                response.sendRedirect("Tabbla.jsp");
                                            }
                                        }
                                        try {
                                            Class.forName("com.mysql.jdbc.Driver");
                                            Connection conexion = DriverManager.getConnection("jdbc:mysql://127.0.0.1/" + baseDatos + "?serverTimezone=UTC", "root", "1234");
                                            System.out.println(conexion);
                                            Statement consulta = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                                            Statement consulta2 = conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
                                            String query = "SELECT curso.NombreCurso AS \"Nombre de Curso\", periodo.FechaInicio AS \"Fecha de inicio\", "
                                                    + "periodo.FechaFin AS \"Fecha de finalización\", periodo.Ingresos AS \"Cantidad Ingresos\", "
                                                    + "periodo.Egresos AS \"Cantidad Egresos\", curso.Registro AS \"Registro\" FROM escuela JOIN curso ON "
                                                    + "escuela.Siglas=curso.Escuela JOIN periodo ON curso.IDCurso=periodo.IDCurso WHERE escuela.Siglas=\""
                                                    + escuela + "\" ORDER BY MONTH(fechaInicio);";
                                            ResultSet nombre = consulta2.executeQuery("SELECT nombre FROM escuela WHERE siglas=\"" + escuela + "\";");
                                            ResultSet rs = consulta.executeQuery(query);
                                            ResultSetMetaData rsmd = rs.getMetaData();
                                            int columnCount = rsmd.getColumnCount();
                                            out.println("<div class=\"table-responsive\">");
                                            if (nombre.next()) {
                                                out.println("<center><h3 style=\"background-color: rgba(168, 218, 254,0.25); color: white;\">" + (escuela + " - " + nombre.getString(1)) + "</h3></center>");
                                            }
                                            nombre.close();
                                            out.println("<tr>");
                                            for (int i = 1; i <= columnCount; i++) {
                                                String columnName = rsmd.getColumnLabel(i);
                                                out.println("<th>" + columnName + "</th>");
                                            }
                                            out.println("</tr>");
                                            int j = 1;
                                            while (rs.next()) {
                                                out.println("<tr>");
                                                for (int i = 1; i <= columnCount; i++) {
                                                    String columnName = rsmd.getColumnLabel(i);
                                                    if (!columnName.equals("Registro")) {
                                                        String columnValue = rs.getString(i);
                                                        out.println("<td>" + columnValue + "</td>");

                                                    } else {
                                                        String EEN = escuela;
                                                        out.println("<td><a href=\"pdf_Registro?EEN=" + EEN + "&curso=" + rs.getString("Nombre de Curso") + "&BaseDatos=" + baseDatos + "\" style=\"color: rgb(10, 37, 67);\">Registro.pdf</a></td>");

                                                    }

                                                }
                                    %>
                                    <td>
                                        <button type="button" id="boton<%=j%>" onclick="clic('<%=rs.getString(4)%>', '<%=rs.getString(5)%>',
                        '<%=rs.getString(1)%>', '<%=rs.getString(2)%>', '<%=rs.getString(3)%>')" style="font-size: 12pt;">
                                            <b>Ver gráficas</b>
                                        </button>
                                    </td>
                                    <%
                                            out.println("</tr>");
                                            totalElementosIngresados += Integer.parseInt(rs.getString(4));
                                            totalElementosEgresados += Integer.parseInt(rs.getString(5));
                                            j++;        
                                        }
                                    %>
                                </table>
                                    <div style="font-family: verdana; font-size: 14pt; color:white">
                                        <br><p style="font-family: verdana; font-size: 14pt;"></p><center><b>CANTIDAD DE CURSOS: </b><%=j - 1%></center>
                                        <p id="numeros"><center><b>CANTIDAD DE ELEMENTOS INGRESADOS: </b><%=totalElementosIngresados%></center></p>
                                        <p id="numeros"><center><b>CANTIDAD DE ELEMENTOS EGRESADOS: </b><%=totalElementosEgresados%></center></p>
                                    </div>
                                    <%
                                            out.println("</div>");
                                            //rs.close();
                                        } catch (SQLException ex) {
                                            out.println("Se produjo una excepción durante la conexión:" + ex);
                                        } catch (Exception ex) {
                                            out.println("Se produjo una excepción:" + ex);
                                        }
                                        escuela = "";

                                    %>

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
    </body>
</html>
