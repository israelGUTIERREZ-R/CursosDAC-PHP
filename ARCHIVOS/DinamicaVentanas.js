function clic(ing, egr, curso, fIn, fFn) {
    var width = 1000;
    var height = 600;
    var chartWindow = window.open('', '_blank', 'width=' + width + ',height=' + height);
    var chartUrl = 'VerGrafica?ingresos=' + ing + '&egresos=' + egr + '&curso=' + curso + '&fechaI=' + fIn + '&fechaF=' + fFn;
    chartWindow.location.href = chartUrl;
}

function mostrarPassword() {
    var x = document.getElementById("password");
    var eyeIcon = document.getElementById("eyeIcon");
    if (x.type === "password") {
        x.type = "text";
        eyeIcon.src = "visible.png";
    } else {
        x.type = "password";
        eyeIcon.src = "ojo.png";
    }
}

function Excel(event) {
    console.log("Excel function called");
    event.preventDefault();

    var fileInput = document.getElementById("file2");

    // Add debugging statements
    console.log("File input:", fileInput);
    console.log("Selected file:", fileInput.files[0]);

    var file = fileInput.files[0];

    if (!file) {
        alert("Please select a file before submitting.");
        return;
    }

    console.log(sacarBD());
    console.log(file);

    var formData = new FormData();
    formData.append("file", file);
    formData.append("BaseDatos", sacarBD());
    document.getElementById('loadingMessage').style.display = 'block';
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ExcelCursosServlet", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var respuesta = xhr.responseText.toString();
            document.getElementById('loadingMessage').style.display = 'none';
            alert(respuesta + "DATOS SUBIDOS CORRECTAMENTE");
            verA();
        } else {
            alert("Error: " + xhr.statusText);
        }
    };

    xhr.send(formData);
}

function Excel2(event) {
    console.log("Excel function called");
    event.preventDefault();

    var fileInput = document.getElementById("file2");

    // Add debugging statements
    console.log("File input:", fileInput);
    console.log("Selected file:", fileInput.files[0]);

    var file = fileInput.files[0];

    if (!file) {
        alert("Please select a file before submitting.");
        return;
    }

    console.log(sacarBD());
    console.log(file);

    var formData = new FormData();
    formData.append("file", file);
    formData.append("BaseDatos", sacarBD());
    document.getElementById('loadingMessage').style.display = 'block';
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ExcelServlet", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var respuesta = xhr.responseText.toString();
            document.getElementById('loadingMessage').style.display = 'none';
            alert(respuesta + "DATOS SUBIDOS CORRECTAMENTE");
            verA();
        } else {
            alert("Error: " + xhr.statusText);
        }
    };

    xhr.send(formData);
}


function subirBD(event) {
    console.log("subirBD function called");
    event.preventDefault(); // Prevent the default form submission

    var idCurso = document.getElementById("cajaIDCurso").value;
    var nombreCurso = document.getElementById("cajaNombreCurso").value;
    var escuela = document.getElementById("combo").value;
    var fileInput = document.getElementById("file");
    var file = fileInput.files[0];

    console.log("idCurso:", idCurso);
    console.log("nombreCurso:", nombreCurso);
    console.log("escuela:", escuela);

    if (idCurso === null || nombreCurso === null || escuela === "Select") {
        alert("Favor de llenar los campos faltantes");
    } else {
        var formData = new FormData();
        formData.append("cajaIDCurso", idCurso);
        formData.append("cajaNombreCurso", nombreCurso);
        formData.append("combo", escuela);
        formData.append("file", file);
        formData.append("BaseDatos", sacarBD());
        document.getElementById('loadingMessage').style.display = 'block';
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "UploadPDFServlet", true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var respuesta = xhr.responseText.toString();
                document.getElementById('loadingMessage').style.display = 'none';
                alert(respuesta + "DATOS SUBIDOS CORRECTAMENTE");
                verA();
            } else {
                alert("Error: " + xhr.statusText);
            }
        };

        xhr.send(formData);
    }



}

function subirBDP(event) {
    console.log("subirBD function called");
    event.preventDefault();

    var idCurso = document.getElementById("comboC").value;
    var periodo = document.getElementById("per").value;
    var fechaInicio = document.getElementById("fechaIn").value;
    var fechaFin = document.getElementById("fechaFn").value;
    var ingresos = document.getElementById("ingresos").value;
    var egresos = document.getElementById("egresos").value;
    var baseDatos = sacarBD();

    console.log("idCurso:", idCurso);
    console.log("periodos:", periodo);
    console.log("inicio:", fechaInicio);
    console.log("fin:", fechaFin);
    console.log("ingresos:", ingresos);
    console.log("egresos:", egresos);

    if (idCurso === null || periodo === null || fechaInicio === null || fechaFin === null || ingresos === null || egresos === null) {
        alert("Favor de llenar los campos faltantes");
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "UploadPeriodo", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var data = "comboC=" + encodeURIComponent(idCurso) +
                "&per=" + encodeURIComponent(periodo) +
                "&fechaIn=" + encodeURIComponent(fechaInicio) +
                "&fechaFn=" + encodeURIComponent(fechaFin) +
                "&ingresos=" + encodeURIComponent(ingresos) +
                "&egresos=" + encodeURIComponent(egresos) +
                "&BaseDatos=" + encodeURIComponent(baseDatos);

        xhr.send(data);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var respuesta = xhr.responseText.toString();
                alert(respuesta + "DATOS SUBIDOS CORRECTAMENTE");
                verA();
            } else {
                alert("Error: " + xhr.statusText);
            }
        };
    }





}

function sacarBD() {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var db = url.searchParams.get("BaseDatos");
    return db;
}
function verTabla() {
    var db = sacarBD();
    var esc = document.getElementsByName("combo")[0].value;
    ver(db, esc);
}

function verI() {
    var db = sacarBD();
    IrInicio(db);
}

function verM() {
    var db = sacarBD();
    IrMod(db);
}

function verA() {
    var db = sacarBD();
    IrAgr(db);
}

function verP() {
    var db = sacarBD();
    IrVerP(db);
}

function verAP() {
    var db = sacarBD();
    IrAgrP(db);
}

function sesionC() {
    var db = sacarBD();
    IrCerrarSesion(db);
}

function IrCerrarSesion(baseDatos) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "SesionServlet", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "BaseDatos=" + encodeURIComponent(baseDatos);
    xhr.send(data);

    xhr.onload = function () {
        if (xhr.status === 200) {
            window.location.href = 'InicioSesion.jsp';
        } else {
            alert("Error: " + xhr.statusText);
        }
    };


}

function IrAgrP(baseDatos) {
    window.location.href = 'AgregarUsuario.jsp?BaseDatos=' + baseDatos;
}

function IrVerP(baseDatos) {
    window.location.href = 'VerPerfil.jsp?BaseDatos=' + baseDatos;
}

function IrAgr(baseDatos) {
    window.location.href = 'AgregarInformacionVP.jsp?BaseDatos=' + baseDatos;
}

function IrMod(baseDatos) {
    window.location.href = 'ModificarInformacion.jsp?BaseDatos=' + baseDatos;
}

function IrInicio(baseDatos) {
    window.location.href = 'PagPrincipal.jsp?BaseDatos=' + baseDatos;
}

function ver(baseDatos, escuela) {
    window.location.href = 'Tabbla.jsp?BaseDatos=' + baseDatos + '&combo=' + escuela;
}

function agregarCurso() {
    var db = sacarBD();
    window.location.href = 'AgregarCurso.jsp?BaseDatos=' + db;
}

function agregarPeriodo() {
    var db = sacarBD();
    window.location.href = 'AgregarPeriodo.jsp?BaseDatos=' + db;
}


