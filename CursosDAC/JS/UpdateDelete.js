function caja1(row) {
    var caja1Element = document.getElementsByName("caja1")[row - 1];
    var caja2Element = document.getElementsByName("caja2")[row - 1];
    var caja6Element = document.getElementsByName("caja6")[row - 1];
    if (caja1Element) {
        caja1Element.disabled = true;
    } else if (caja2Element) {
        caja2Element.disabled = true;
    } else if (caja6Element) {
        caja6Element.disabled = true;
    }
}
function sacarBD() {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var db = url.searchParams.get("BaseDatos");
    return db;
}

function verI() {
    var db = sacarBD();
    IrInicio(db);
}

function IrInicio(baseDatos) {
    window.location.href = 'PagPrincipal.php?BaseDatos=' + baseDatos;
}


function modificarBaseDeDatos(row) {
    var nombreCurso = document.getElementsByName("caja1")[row - 1].value;
    var fechaInicio = document.getElementsByName("caja2")[row - 1].value;
    var fechaFin = document.getElementsByName("caja3")[row - 1].value;
    var ingresos = document.getElementsByName("caja4")[row - 1].value;
    var egresos = document.getElementsByName("caja5")[row - 1].value;
    var numP = document.getElementsByName("caja6")[row - 1].value;
    var baseDatos = sacarBD();

    console.log(nombreCurso +" "+ fechaInicio+" "+fechaFin+" "+ingresos+" "+egresos+" "+numP+" "+baseDatos);

    // Enviar datos al servidor mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "servlets/ModificarInformacionServlet2.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "caja1=" + encodeURIComponent(nombreCurso) +
            "&caja2=" + encodeURIComponent(fechaInicio) +
            "&caja3=" + encodeURIComponent(fechaFin) +
            "&caja4=" + encodeURIComponent(ingresos) +
            "&caja5=" + encodeURIComponent(egresos) +
            "&caja6=" + encodeURIComponent(numP) +
            "&BaseDatos=" + encodeURIComponent(baseDatos);

    xhr.send(data);
    document.getElementById('loadingMessage').style.display = 'block';
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var respuesta = xhr.responseText.toString();
            document.getElementById('loadingMessage').style.display = 'none';
            alert(respuesta + "MODIFICACIÓN DE DATOS REALIZADA");
            verI();
        }
    };

}

function eliminarBaseDeDatos(row) {
    var nombreCurso = document.getElementsByName("caja1")[row - 1].value;
    var fechaInicio = document.getElementsByName("caja2")[row - 1].value;
    var fechaFin = document.getElementsByName("caja3")[row - 1].value;
    var ingresos = document.getElementsByName("caja4")[row - 1].value;
    var egresos = document.getElementsByName("caja5")[row - 1].value;
    var numP = document.getElementsByName("caja6")[row - 1].value;
    var baseDatos = sacarBD();

    document.getElementById('loadingMessage').style.display = 'block';
    // Enviar datos al servidor mediante AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "servlets/EliminarInformacionServlet.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "caja1=" + encodeURIComponent(nombreCurso) +
            "&caja2=" + encodeURIComponent(fechaInicio) +
            "&caja3=" + encodeURIComponent(fechaFin) +
            "&caja4=" + encodeURIComponent(ingresos) +
            "&caja5=" + encodeURIComponent(egresos) +
            "&caja6=" + encodeURIComponent(numP) +
            "&BaseDatos=" + encodeURIComponent(baseDatos);

    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            console.log(xhr.responseText);  // Log the response
            if (xhr.status === 200) {
                document.getElementById('loadingMessage').style.display = 'none';
                alert("ELIMINACION DE PERIODO REALIZADA");
                verI();
            } else {
                alert("ERROR");
            }
        }
    };

}





