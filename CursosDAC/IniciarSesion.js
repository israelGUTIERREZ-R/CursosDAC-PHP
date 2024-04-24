function inicioSesion(event){
    event.preventDefault();

    const cajaUser = document.getElementById("cajaUser").value;
    const cajaPassword = document.getElementById("cajaPassword").value;

    const formData = new FormData();
    formData.append('cajaUser', cajaUser);
    formData.append('cajaPassword', cajaPassword);

    console.log(cajaUser+" "+cajaPassword);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "servletsPHP/IniciarSesion.php", true);
    xhr.onreadystatechange = function() {
        if (!(xhr.readyState === 4 && xhr.status === 200)) {
            alert("Error: " + xhr.statusText);
            
        }
        
    };
    xhr.send(formData);
}