const form = document.querySelector("#form");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const jobSelect = document.querySelector("#job");
const messageTextarea = document.querySelector("#message");

form.addEventListener("submit", (event) => {
    event.preventDefault();

    //verifica se o nome está vazio
    if(nameInput.value === "") {
        alert("Por favor, preencha seu nome");
        return;
    }
});