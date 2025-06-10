 <main>
   <section class="agendamento">
    <h1 class="titulo-formulario">Formulário Max</h1>
    <form id="form">
      <label for="name">Nome:</label>
      <input type="text" id="name">

      <label for="email">E-mail:</label>
      <input type="email" id="email">

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

<script>
  const form = document.querySelector("#form");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const jobSelect = document.querySelector("#job");
const messageTextarea = document.querySelector("#message");

form.addEventListener("submit", (event) => {
    event.preventDefault();

    //verifica se o nome está vazio
    if(nameInput.value === "") {
        alert("Por favor, preencha seu nome")
        return;
    }

    //verifica se o nome esta escrito corretamente
    if ( !isNomeValid(nameInput.value)) {
      alert("Por favor, preencha seu nome corretamente (somente letras e espaços).");
      return;
    }

    //verifica se o email esta prenchido e se é valido
    if (emailInput.value === "") {
      alert("Por favor, preencha seu email");
      return;
    }

    //verifica se o email esta escrito corrtamente
    if (!isEmailValid(emailInput.value)) {
      alert("Por favor, preencha seu email corretamente")
      return;
    }

    //verifica se a situação foi selecionada
    if(jobSelect.value === "") {
      alert("Por favor, selecione uma das duas opções");
      return;
    }

    //verifica se a mensagem esta preenchida
    if(messageTextarea.value === "") {
      alert("Por favor, escreva uma mensagem");
      return;
    }

    //se todos os campos estiverem corretamente preenchidos, envie o form
    form.submit();
});

//Função que valida o email
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

//Função que válida o nome
function isNomeValid(nome) {
  //cria uma regex para validar o nome
const nomeRegex = new RegExp(
  /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/
)

if(nomeRegex.test(nome) && nome.trim().length > 1) {
  return true;
}
return false;
}
</script>