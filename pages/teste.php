<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário Teste</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      width: 100%;
      overflow-x: hidden;
    }

    *, *::before, *::after {
      box-sizing: inherit;
    }

    .agendamento {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 15px;
      background-color: #f1f1f1;
    }

    .agendamento input,
    .agendamento textarea,
    .agendamento select,
    .agendamento button {
      width: 100%;
      max-width: 100%;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    @media (max-width: 576px) {
      .agendamento {
        max-width: 95%;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<section class="agendamento">
  <h1>Formulário Max</h1>
  <form>
    <label for="name">Nome:</label>
    <input type="text" id="name" class="form-control">

    <label for="email">E-mail:</label>
    <input type="email" id="email" class="form-control">

    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" class="form-control">

    <label for="cep">CEP:</label>
    <input type="text" id="cep" class="form-control">

    <label for="job">Já usou nossos serviços antes?</label>
    <select id="job" class="form-select">
      <option value="">Selecione</option>
      <option value="yes">Sim</option>
      <option value="no">Não</option>
    </select>

    <label for="message">Mensagem:</label>
    <textarea id="message" class="form-control" rows="4"></textarea>

    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</section>

</body>
</html>
