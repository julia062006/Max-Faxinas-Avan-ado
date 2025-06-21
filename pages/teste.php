<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Teste Mobile</title>
<style>
  .desktop {
    display: block;
    background: lightblue;
    padding: 40px;
    text-align: center;
  }
  .mobile {
    display: none;
    background: lightgreen;
    padding: 40px;
    text-align: center;
  }
  @media (max-width: 768px) {
    .desktop {
      display: none;
    }
    .mobile {
      display: block;
    }
  }
</style>
</head>
<body>

<div class="desktop">Sou Desktop - só aparece em telas largas</div>
<div class="mobile">Sou Mobile - só aparece em telas pequenas</div>

</body>
</html>
