<?php
  //print_r($_SERVER);
  $base = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
  //SERVER_NAME -> localhost / www.uol.com.br (esse uol é um exemplo)
  //SCRIPT_NAME -> /Faxinas%Max/index.php
  //echo $base; (era so para ver se estava funcionando)
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Max Faxinas</title>

  <!-- Ícone da aba -->
  
  <base href="http://<?=$base?>">

  <link rel="shortcut icon" href="imagens/Casa max.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="CSS/style.css">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>

  <!--Fonte letra-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

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
              <a class="nav-link" aria-current="page" href="index.php?param=home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?param=quemSou">Quem sou</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?param=servico">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="btn" href="index.php?param=agendamento">Agendamento</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

<main>
   
  <?php
    //print_r($_GET);
    $param = $_GET["param"];

      //incluir o arquivo do array
        include "array.php";
        
      $pagina = $_GET["param"] ?? "home";

      //produto/0 - produto 0
      $param = explode("/", $pagina);
     // print_r($param); teste
     //$pagina = $param(0);
      $id = $param[1] ?? NULL;

      echo $id;

     // home -> pages/home.php
      $pagina = "pages/{$pagina}.php";

     // verficar se a pagina existe
      if (file_exists($pagina)) {
        include $pagina;
      } else {
        include "pages/erro.php";
      }
  ?>

</main>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

 <footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
      <div class="row">
        <!-- Sobre -->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-3">Max Faxinas</h5>
          <p>
            Cuidamos da sua casa com carinho e dedicação, oferecendo serviços de limpeza para que você tenha mais tempo
            livre, conforto e bem-estar.
          </p>
        </div>

        <!-- Links -->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-3">Links Rápidos</h5>
          <ul class="list-unstyled">
            <li><a href="indexHome.html" class="text-dark text-decoration-none">Home</a></li>
            <li><a href="quemSou.html" class="text-dark text-decoration-none">Quem Sou</a></li>
            <li><a href="servico.html" class="text-dark text-decoration-none">Serviços</a></li>
            <li><a href="agendamento.html" class="text-dark text-decoration-none">Agendamento</a></li>
          </ul>
        </div>

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
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #13315c; color: white;">
      © 2025 Max Faxinas — Todos os direitos reservados.
    </div>
  </footer>


</body>

</html>