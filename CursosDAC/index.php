<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="CSS/0.1 styles.pag.prin.css">
        <title>Base de datos UNINAV</title>
        <link rel="shortcut icon" href="uninav.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </head>

    <body>
        <!-- //////////////////////////////////////////Video de fondo //////////////////////////////////////////////////// -->
        <video 
            src="multimedia/golden_-_48569 (1080p).mp4" autoplay="true" 
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
                            <!-- //////////////////////////////////////////Area de la tbla con info//////////////////////////////////////////////////// -->
                            <div class="row color-tablaeimagen d-flex justify-content-center table-responsive">
                                <table style="width: 32%;">
                                    <thead>
                                        <tr>
                                            <th class="fondo-imp">
                                                <br>
                                                ¡IMPORTANTE!
                                                <br>
                                                ______________________________________________________________
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="fondo-bienv">
                                                <p class="letra-bienv">
                                                    Bienvenido a la base de datos de la UNINAV, 
                                                </p>
                                                <b class="letra-ins">
                                                    &nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;
                                                    Instrucciones de acceso: 
                                                </b>
                                                <ol class="list-coletr">
                                                    <li>Inicia sesión con el usuario otorgado.</li>
                                                    <li> Digita tu contraseña.</li>
                                                    <li> Pulsa Iniciar sesión.</li>
                                                    <li> ¡IMPORTANTE! siempre cerrar sesión para evitar bloqueo de cuenta. </li>
                                                </ol>
                                                <p class="letra-fin"> 
                                                    Esta base de datos fue diseñada por el Departamento de 
                                                    <br>
                                                    Comunicación Web, perteneciente a la
                                                    <br>
                                                    Universidad Naval.
                                                </p>
                                                <p class="linea-ador">
                                                    ___________________________________________________________________________
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- //////////////////////////////////////////Imagen alineada con la img base de //////////////////////////////////////////////////// -->
                                <div class="col img-01 d-flex justify-content-end">
                                    <img  src="images/Base de datos 2.png" class="img-fluid" alt="Poster data base">
                                </div>
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
