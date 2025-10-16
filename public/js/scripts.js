    function mostrarSenha() {
      var campo = document.getElementById("senha");
      if (campo.type == "password") {
        campo.type = "text";
      } else {
        campo.type = "password";
      }
    }
  

  $(document).ready(function() {
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 00000-0000');
    $('.cpf').mask('000.000.000-00');
  });

  const form = document.querySelector("#form");
  const nameInput = document.querySelector("#name");
  const cpfInput = document.querySelector("#cpf");
  const emailInput = document.querySelector("#email");
  const telefoneInput = document.querySelector("#telefone");
  const enderecoInput = document.querySelector("#endereco");
  const jobSelect = document.querySelector("#job");
  const calendarioInput = document.querySelector("#calendario");

  form.addEventListener("submit", (event) => {
    //verifica se o NOME está vazio
    if (nameInput.value === "") {
      event.preventDefault();

      alert("Por favor, preencha seu nome")
      return;
    }
    //verifica se o NOME esta escrito corretamente
    if (!isNomeValid(nameInput.value)) {
      event.preventDefault();

      alert("Por favor, preencha seu nome corretamente (somente letras e espaços).");
      return;
    }

    if (cpfInput.value === "") {
      event.preventDefault();
      alert("Por favor, preencha seu CPF");
      return;
    }

    if (!isCpfValid(cpfInput.value)) {
      event.preventDefault();
      alert("Por favor, preencha um CPF válido");
      return;
    }

    //verifica se o EMAIL esta prenchido e se é valido
    if (emailInput.value === "") {
      event.preventDefault();

      alert("Por favor, preencha seu email");
      return;
    }
    //verifica se o EMAIL esta escrito corretamente
    if (!isEmailValid(emailInput.value.trim())) {
      event.preventDefault();

      alert("Por favor, preencha seu email corretamente")
      return;
    }


    //verifica o TELEFONE está vazio
    if (telefoneInput.value === "") {
      event.preventDefault();

      alert("Por favor, preencha seu telefone")
      return;
    }
    //verifica se o TELEFONE esta escrito corretamente
    if (!isTelefoneValid(telefoneInput.value)) {
      event.preventDefault();

      alert("Por favor, preencha seu telefone corretamente")
      return;
    }

    // verifica se o CEP esta vazio
    if (enderecoInput.value === "") {
      event.preventDefault();

      alert("Por favor, prencha o endereço");
      return;
    }
    //verifica se o CEP foi preenchido corretamente
     if (!isCepValid(cepInput.value)) {
      event.preventDefault();

      alert("Por favor, preencha um CEP válido (formato 00000-000)");
      return;
     }

    //verifica se a SITUAÇÃO foi selecionada
    if (jobSelect.value === "") {
      event.preventDefault();

      alert("Por favor, selecione uma das três opções");
      return;
    }

    if (calendarioInput.value === "") {
      event.preventDefault();
      alert("Por favor, selecione uma data");
      return;
    }

    form.reset();
  });

  //Função que válida o NOME
  function isNomeValid(nome) {

    //cria uma regex para validar o nome
    const nomeRegex = new RegExp(/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/);

    //verifica se nome tem apenas letras e espaços e tem pelo menos 3 letras úteis
    if (nomeRegex.test(nome) && nome.trim().length >= 3) {
      return true;
    }
    return false;
  }

  function isCpfValid(cpf) {
    cpf = cpf.replace(/[^\d]/g, '');

    if (cpf.length === 11) {
      return true;
    }

    return false;
  }

  //Função que valida o EMAIL
  function isEmailValid(email) {

    //cria uma regex  para validar  email
    const emailRegex = new RegExp(
      //usuario12@hsot.com.br
      /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,}$/
    );
    if (emailRegex.test(email)) {
      return true;
    }
    return false;

  }

  //função que valida o TELEFONE
  function isTelefoneValid(telefone) {

    //cria uma Regex para validar o telefone:
    // Regex que valida formato com DDD opcional entre parênteses, espaço opcional,
    // número com 4 ou 5 dígitos + hífen + 4 dígitos
    const telefoneRegex = new RegExp(/^\(?\d{2}\)?\s?\d{4,5}-\d{4}$/);

    // Remove tudo que não for número
    const numeros = telefone.replace(/\D/g, '');

    // Verifica se bate com a regex E se tem pelo menos 7 dígitos numéricos
    if (telefoneRegex.test(telefone) && numeros.length >= 7) {
      return true;
    }
    return false;
  }
