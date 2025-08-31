<main>
  <section class="agendamento">
    <h1 class="titulo mb-4">Formulário Max</h1>
    <form id="form">
      <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text" id="name" class="form-control" placeholder="Digite seu nome">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" id="email" class="form-control" placeholder="Digite seu e-mail">
      </div>

      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="tel" id="telefone" class="form-control telefone" placeholder="(XX) XXXXX-XXXX">
      </div>

      <div class="mb-3">
        <label for="cep" class="form-label">CEP:</label>
        <input type="tel" id="cep" class="form-control cep" placeholder="XXXXX-XXX">
      </div>

      <div class="mb-3">
        <label for="job" class="form-label">Qual o serviço você quer contratar?</label>
        <select name="job" id="job" class="form-select">
          <option value="">Selecione uma opção</option>
          <option value="Limpeza Comercial">Limpeza Comercial - 8H00 às 12H00 - R$150,00</option>
          <option value="Limpeza Residencial">Limpeza Residencial - 8H00 às 14H00 - R$200,00</option>
          <option value="Limpeza Pós-Obra">Limpeza Pós-Obra - 8H00 às 17H00 - R$300,00</option>
        </select>
      </div>

      <div>
        <label for="">Selecione uma data</label>
        <input type="text" id="calendario" placeholder="Selecione uma data">
      </div>

      <div class="col-12">
        <button class="btn btn-primary btn-agendamento" type="submit">Enviar</button>
      </div>
    </form>


  </section>
</main>

<script>
  flatpickr("#calendario", {
    locale: "pt",
    altInput: true,
    altFormat: "j F, Y",
    dateFormat: "d-m-Y",
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
<script>
  $(document).ready(function() {
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 00000-0000');
  });

  const form = document.querySelector("#form");
  const nameInput = document.querySelector("#name");
  const emailInput = document.querySelector("#email");
  const telefoneInput = document.querySelector("#telefone");
  const cepInput = document.querySelector("#cep");
  const jobSelect = document.querySelector("#job");
//todo: COLOCAR VALIDAÇAO NA DATA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  form.addEventListener("submit", (event) => {
    event.preventDefault();

    //verifica se o NOME está vazio
    if (nameInput.value === "") {
      alert("Por favor, preencha seu nome")
      return;
    }
    //verifica se o NOME esta escrito corretamente
    if (!isNomeValid(nameInput.value)) {
      alert("Por favor, preencha seu nome corretamente (somente letras e espaços).");
      return;
    }


    //verifica se o EMAIL esta prenchido e se é valido
    if (emailInput.value === "") {
      alert("Por favor, preencha seu email");
      return;
    }
    //verifica se o EMAIL esta escrito corretamente
    if (!isEmailValid(emailInput.value.trim())) {
      alert("Por favor, preencha seu email corretamente")
      return;
    }


    //verifica o TELEFONE está vazio
    if (telefoneInput.value === "") {
      alert("Por favor, preencha seu telefone")
      return;
    }
    //verifica se o TELEFONE esta escrito corretamente
    if (!isTelefoneValid(telefoneInput.value)) {
      alert("Por favor, preencha seu telefone corretamente")
      return;
    }


    // verifica se o CEP esta vazio
    if (cepInput.value === "") {
      alert("Por favor, prencha o CEP");
      return;
    }
    //verifica se o CEP foi preenchido corretamente
    if (!isCepValid(cepInput.value)) {
      alert("Por favor, preencha um CEP válido (formato 00000-000)");
      return;
    }

    //verifica se a SITUAÇÃO foi selecionada
    if (jobSelect.value === "") {
      alert("Por favor, selecione uma das duas opções");
      return;
    }

   //COLCOAR VALIDAÇAO NA DATA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    alert("Formulário enviado com sucesso! Agora vamos te levar ao WhatsApp.");

    // Mensagem padrão para o WhatsApp
    const mensagem = "Tenho interesse nos serviços Max Faxinas.";

    // Redireciona para o WhatsApp com a mensagem
    window.location.href = `https://wa.me/554499444208?text=${encodeURIComponent(mensagem)}`;

    // Limpa o formulário
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

    //essa funçao aceita: (11) 91234-5678
    // 11 91234-5678
    // (11) 1234-5678
  }

  //Função que valida o CEP
  function isCepValid(cep) {
    const cepRegex = /^\d{5}-\d{3}$/;
    return cepRegex.test(cep);
  }
</script>