function sacarBD() {
            var url_string = window.location.href;
            var url = new URL(url_string);
            var db = url.searchParams.get("BaseDatos");
            return db;
        }

function modificarNombreUser(){
     var nombreUser = document.getElementsByName("USER")[0].value;
     var rolUser = document.getElementsByName("ROL")[0].value;
     var contraUser = document.getElementsByName("PASS")[0].value;
     var baseDatos=sacarBD();
     
     console.log(nombreUser+" "+rolUser+" "+contraUser);
     document.getElementById('loadingMessage').style.display = 'block';
      var xhr = new XMLHttpRequest();
    xhr.open("POST", "./servlets/ModificarUser.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "USER=" + encodeURIComponent(nombreUser) +
            "&ROL=" + encodeURIComponent(rolUser) +
            "&PASS=" + encodeURIComponent(contraUser)+
            "&BaseDatos="+encodeURIComponent(baseDatos);
    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('loadingMessage').style.display = 'none';
            var respuesta = xhr.responseText.toString();
            alert(respuesta + "MODIFICACIÓN DE USUARIO REALIZADA");
            verInicio();
        }
    };
}

function modificarPasswordUser(){
     var nombreUser = document.getElementsByName("USER")[0].value;
     var rolUser = document.getElementsByName("ROL")[0].value;
     var contraUser = document.getElementsByName("PASS")[0].value;
     var baseDatos=sacarBD();
     
     console.log(nombreUser+" "+rolUser+" "+contraUser);
     document.getElementById('loadingMessage').style.display = 'block';
      var xhr = new XMLHttpRequest();
    xhr.open("POST", "./servlets/ModificarPassword.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "USER=" + encodeURIComponent(nombreUser) +
            "&ROL=" + encodeURIComponent(rolUser) +
            "&PASS=" + encodeURIComponent(contraUser)+
            "&BaseDatos="+encodeURIComponent(baseDatos);
    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('loadingMessage').style.display = 'none';
            var respuesta = xhr.responseText.toString();
            alert(respuesta + "MODIFICACIÓN DE CONTRASEÑA REALIZADA");
            verInicio();
        }
    };
}

function agregarUser(){
     var nombreUser = document.getElementsByName("USER")[0].value;
     var rolUser = document.getElementsByName("combo")[0].value;
     var contraUser = document.getElementsByName("PASS")[0].value;
     var baseDatos=sacarBD();
     
     console.log(nombreUser+" "+rolUser+" "+contraUser);
     document.getElementById('loadingMessage').style.display = 'block';
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./servlets/AgregarUser.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var data = "USER=" + encodeURIComponent(nombreUser) +
            "&ROL=" + encodeURIComponent(rolUser) +
            "&PASS=" + encodeURIComponent(contraUser)+
            "&BaseDatos="+encodeURIComponent(baseDatos);
    xhr.send(data);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('loadingMessage').style.display = 'none';
            var respuesta = xhr.responseText.toString();
            alert(respuesta + "USUARIO AGREGADO EXITOSAMENTE");
            verInicio();
        }
    };
}
