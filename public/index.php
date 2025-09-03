<?php
//print_r($_SERVER);
$base = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}";
//SERVER_NAME -> localhost / www.uol.com.br (esse uol é um exemplo)
//SCRIPT_NAME -> /Faxinas%Max/index.php
//echo $base; (era so para ver se estava funcionando)

require_once __DIR__ . '/../vendor/autoload.php';
use App\Model\Cliente;

if ($_POST) {
    $user = new Cliente(
        cpf: $_POST['user_cpf'] ?? '',
        nome: $_POST['user_nome'] ?? '',
        email: $_POST['user_email'] ?? '',
        telefone: $_POST['user_telefone'] ?? '',
        endereco: $_POST['user_endereco'] ?? ''
    );
    $user->save();

    // Atualiza a lista de usuários para exibir na tabela
    $users = Cliente::findAll() ?? [];
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Max Faxinas</title>

  <!-- Ícone da aba -->

  <base href="<?= $base ?>">

  <link rel="shortcut icon" href="imagens/Casa max.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <!--   Bootstrap icones -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="CSS/style.css">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>


  <!--Fonte letra-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>


</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <img class="logocabecalho" src="imagens/Max faxinas.png" alt="Logo Max Faxinas">
        <!--    <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="quemsou">Quem sou</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="servico">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="administrador">Administrador</a>
            </li>
            <li class="nav-item">
              <a class="btn" href="agendamento">Agendamento</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>

    <?php
    //incluir o arquivo do array
    include __DIR__ . "/../src/array.php";

    
    $pagina = "home";
    if (isset($_GET["param"])) {
      $param = explode("/", $_GET["param"]);
      $pagina = $param[0];
    }

    //$pagina = $param(0);
    $id = $param[1] ?? NULL;

    echo $id;

    // home -> pages/home.php
    $pagina = __DIR__ . "/../src/pages/{$pagina}.php";

    // verficar se a pagina existe
    if (file_exists($pagina)) {
      include $pagina;
    } else {
      include __DIR__ . "/../src/pages/erro.php";
    }
    ?>

  </main>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
      <div class="row">

        <!-- Contato -->
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-3">Contato</h5>
          <p class="mb-2">
            <i class="bi bi-whatsapp" style="color: #25d366;"></i>
            <a href="https://wa.me/554499444208" target="_blank" class="text-dark text-decoration-none">
              +55 44 9944-4208
            </a>
          </p>

          <p>
            <i class="bi bi-geo-alt-fill" style="color: #e63946;"></i>
            Araruna/Paraná
          </p>
        </div>

        <!-- Links -->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-3">Links Rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="home" class="text-dark text-decoration-none">Home</a></li>
            <li><a href="quemsou" class="text-dark text-decoration-none">Quem Sou</a></li>
            <li><a href="servico" class="text-dark text-decoration-none">Serviços</a></li>
            <li><a href="agendamento" class="text-dark text-decoration-none">Agendamento</a></li>
          </ul>
        </div>

        <!-- Sobre -->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-3">Max Faxinas</h5>
          <p>
            Cuidamos da sua casa com carinho e dedicação, oferecendo serviços de limpeza para que você tenha mais tempo
            livre, conforto e bem-estar.
          </p>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #13315c; color: white;">
      © 2025 Max Faxinas — Todos os direitos reservados.
    </div>
  </footer>

</body>

</html>