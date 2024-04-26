function elegirBD() {
                    var db = document.getElementsByName("combo")[0].value;
                    if (db === "cursosdac") {
                        Swal.fire({
                            title: 'Introduce la contraseña de root',
                            input: 'password',
                            inputPlaceholder: 'Tu contraseña',
                            inputAttributes: {
                                autocapitalize: 'off'
                            },
                            showCancelButton: true,
                            confirmButtonColor: 'rgb(14, 50, 145)',
                            confirmButtonText: 'Aceptar',
                            showLoaderOnConfirm: true,
                            customClass: {
                                title: 'miEstilo',
                                input: 'fondo'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (result.value === "UninaV*2024") {
                                    alert("BIENVENID@");
                                    inicioSesion(db);
                                } else {
                                    alert("Acceso denegado. No tiene los privilegios suficientes");
                                }
                            }
                        });
                    } else {
                        inicioSesion(db);
                    }
                }

function inicioSesion(baseDatos) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "servlets/InicioBaseDatos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "BaseDatos=" + encodeURIComponent(baseDatos);
    xhr.send(data);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && (xhr.status === 200)) {
            if (baseDatos === "Select") {
                alert("Elige una base de datos para consultar");
            } else {
                alert("BIENVENID@");
               window.location.href = 'PagPrincipal.php?BaseDatos=' + baseDatos;
            }
        }
    };
}

function nombreBD() {
    let nombre = prompt("Introduzca el nombre \"cursosdac\" con un año (Ej. cursosdac2024)");
    if (nombre !== null) {
        agregarBD(nombre);
    }
}

function IrInicio(baseDatos) {
    if (baseDatos === "Select") {
        alert("Elige una base de datos para consultar");
    } else {
        alert("BIENVENID@");
        window.location.href = 'PagPrincipal.php?BaseDatos=' + baseDatos;
    }
}

function agregarBD(nombre) {
    var nombreBD = nombre;
    console.log(nombreBD);
    document.getElementById('loadingMessage').style.display = 'block';
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "servlets/NuevaBD.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "nombreBD=" + encodeURIComponent(nombreBD);
    xhr.send(data);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('loadingMessage').style.display = 'none';
            var respuesta = xhr.responseText.toString();
            IrInicio(nombre);
        }

    };
}
