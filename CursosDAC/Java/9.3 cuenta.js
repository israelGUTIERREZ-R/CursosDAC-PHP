// Carga los datos del perfil desde el almacenamiento local en el navegador
$(document).ready(function() {
    var perfil = localStorage.getItem("perfil");
    if (perfil) {
      perfil = JSON.parse(perfil);
      $("#nombre-perfil").text(perfil.nombre);
      $("#email-perfil").text(perfil.email);
      $("#bio-perfil").text(perfil.bio);
      $("#password-perfil").text(" *********"); // Muestra la contraseña encriptada en el perfil del usuario
    }
  });
  
  // Muestra el formulario de edición de perfil y carga los datos del perfil en los campos del formulario
  $("#edit-profile-btn").click(function() {
    $("#edit-profile-form").show();
    if (localStorage.getItem("perfil")) {
      var perfil = JSON.parse(localStorage.getItem("perfil"));
      $("#nombre").val(perfil.nombre);
      $("#email").val(perfil.email);
      $("#bio").val(perfil.bio);
    }
  });
  
  // Guarda los cambios en el perfil en el almacenamiento local en el navegador
  $("#editar-perfil-form").on("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe y recargue la página
  
    // Obtiene los datos del formulario de edición de perfil
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var bio = $("#bio").val();
    var password = $("#password").val();
  
    // Verifica que el tipo de la contraseña no sea "text" antes de guardar los cambios en el perfil
    if ($("#password").attr("type") !== "text") {
      // Guarda los datos del perfil en el almacenamiento local en el navegador
      var perfil = {
        nombre: nombre,
        email: email,
        bio: bio,
        password: password
      };
      localStorage.setItem("perfil", JSON.stringify(perfil));
  
      // Actualiza los datos del perfil en la vista
      $("#nombre-perfil").text(nombre);
      $("#email-perfil").text(email);
      $("#bio-perfil").text(bio);
      $("#password-perfil").text("*******"); // Muestra la contraseña encriptada en el perfil del usuario
  
      // Oculta el formulario de edición de perfil
      $("#edit-profile-form").hide();
    }
  });
  
  // Muestra o oculta la contraseña en el formulario de edición de perfil
  $("#ver-password-btn").click(function() {
    var passwordInput = $("#password");
    if (passwordInput.attr("type") === "password") {
      passwordInput.attr("type", "text");
      $(this).text("Ocultar Contraseña");
    } else {
      passwordInput.attr("type", "password");
      $(this).text("Ver Contraseña");
    }
  });