<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/0.2 styles.in.ses.css">
        <link rel="shortcut icon" href="uninav.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/DinamicaVentanas.js"></script>
        <title>Inicio de Sesion | Base de datos UNINAV</title>
    </head>
    <body>
        <!-- //////////////////////////////////////////Particulas JS //////////////////////////////////////////////////// -->
        <!-- ID Particles.js -->
        <div id="particles-js" ></div>
        <!-- JS Particles.js -->
        <script src="Java/Particulas/particles.min.js"></script>
        <script src="Java/Particulas/app.js"></script>
        <!-- JS FontAwesome -->
        <script src="https://kit.fontawesome.com/a2e8d0339c.js"></script>

        <!-- //////////////////////////////////////////Video de fondo //////////////////////////////////////////////////// -->
        <video 
            src="multimedia/Mundo.mp4" autoplay="true" 
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
                            <!-- //////////////////////////////////////////Area de botones del header//////////////////////////////////////////////////// -->
                            <div class="row fondo-boton">
                                <div>
                                    <div class="button-container">
                                        <button style="background-color: black;" 
                                                class="inline-button"><a style="color: white;text-decoration:none;" 
                                                                 href="index.php">Pág.principal</button></a>
                                        <button style="background-color: black;" 
                                                class="inline-button"><a style="color: white;text-decoration:none;" 
                                                                 href="InicioSesion.php">Inicio de sesión</button></a>
                                    </div>
                                </div>
                            </div>
                            <!-- //////////////////////////////////////////Area de formulario//////////////////////////////////////////////////// -->
                            <div class="row formulario">
                                <h1>
                                    Inicio de sesión</h1>
                                <form method="post" action="servlets/IniciarSesionServlet.php"> 
                                    <div class="username">
                                        <input type="text" name="cajaUser" id="cajaUser" placeholder="Nombre de usuario" required />
                                    </div>
                                    <div class="username">
                                        <input type="password" name="cajaPassword" id="cajaPassword" placeholder="Contraseña" required />
                                    </div>
                                    <input type="submit" name="boton" value="Iniciar"/>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- //////////////////////////////////////////Zona del footer//////////////////////////////////////////////////// -->
            <div class="conteiner-fluid bg-ligth text-center p-3 ajust-foot">
                <p><br><br>&copy; 2024. Universidad Naval</p>
                <p>Calzada de la Virgen 1800, Col. Ex-Ejido de San Pablo Tepetlapa. Alcaldía Coyoacán, Ciudad de México CP. 04840. Teléfono: 56-24-65-00 ext. 8764. </p>
                <img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid"><img src="images/fpleca monedita.png"  class="foot-img img-fluid">
            </div>
        </div>
    </body>
</html>

