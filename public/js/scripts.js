function mostrarSenha() {
  var campo = document.getElementById("senha");
  if (campo.type == "password") {
    campo.type = "text";
  } else {
    campo.type = "password";
  }
}



$(document).ready(function () {
    $('.telefone').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.numero').mask('00000'); 
});