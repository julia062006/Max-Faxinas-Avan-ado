 <main>
   <section class="agendamento">
    <h1 class="titulo">Formulário Max</h1> 
    <form id="form">
      <label for="name">Nome:</label>
      <input type="text" id="name">

      <label for="email">E-mail:</label>
      <input type="email" id="email">

      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" class="telefone">

      <label for="number">CEP:</label>
      <input type="text" id="cep" class="cep"> 

      <label for="job">Você já usou nossos serviços antes?</label>
      <select name="job" id="job">
        <option value="">Selecione uma opção</option>
        <option value="yes">Sim</option>
        <option value="no">Não</option>
      </select>

      <label for="message">Mensagem:</label>
      <textarea name="message" id="message"></textarea>

      <button class="btn-agendamento" type="submit">Enviar</button>
    </form>


   </section>
  </main>

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
 const messageTextarea = document.querySelector("#message");

 form.addEventListener("submit", (event) => {
    event.preventDefault();

    //verifica se o NOME está vazio
    if(nameInput.value === "") {
        alert("Por favor, preencha seu nome")
        return;
    }
    //verifica se o NOME esta escrito corretamente
    if ( !isNomeValid(nameInput.value)) {
      alert("Por favor, preencha seu nome corretamente (somente letras e espaços).");
      return;
    }


    //verifica se o EMAIL esta prenchido e se é valido
    if (emailInput.value === "") {
      alert("Por favor, preencha seu email");
      return;
    }
    //verifica se o EMAIL esta escrito corrtamente
    if (!isEmailValid(emailInput.value)) {
      alert("Por favor, preencha seu email corretamente")
      return;
    }


    //verifica o TELEFONE está vazio
    if(telefoneInput.value === "")  {
      alert("Por favor, preencha seu telefone")
      return;
    }
    //verifica se o TELEFONE esta escrito corretamente
    if(!isTelefoneValid(telefoneInput.value)) {
      alert("Por favor, preencha seu telefone corretamente")
      return; 
    }


    // verifica se o CEP esta vazio
    if(cepInput.value === "") {
      alert("Por favor, prencha o CEP");
      return;
    }
    //verifica se o CEP foi preenchido corretamente
    if(!isCepValid(cepInput.value)) {
      alert("Por favor, preencha um CEP válido (formato 00000-000)");
      return;
    }

    //verifica se a SITUAÇÃO foi selecionada
    if(jobSelect.value === "") {
      alert("Por favor, selecione uma das duas opções");
      return;
    }

    //verifica se a MENSSAGEM esta preenchida
    if(messageTextarea.value === "") {
      alert("Por favor, escreva uma mensagem");
      return;
    }

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
if(nomeRegex.test(nome) && nome.trim().length >= 3) {
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
  if(emailRegex.test(email)) {
    return true;
  } 
  return false; 

}

//função que valida o TELEFONE
function isTelefoneValid(telefone) {

  //cria uma Regex para validar o telefone:
  // Regex que valida formato com DDD opcional entre parênteses, espaço opcional,
  // número com 4 ou 5 dígitos + hífen + 4 dígitos
  const telefoneRegex = new RegExp (/^\(?\d{2}\)?\s?\d{4,5}-\d{4}$/);

   // Remove tudo que não for número
  const numeros = telefone.replace(/\D/g, '');

    // Verifica se bate com a regex E se tem pelo menos 7 dígitos numéricos
   if(telefoneRegex.test(telefone) && numeros.length >= 7) {
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