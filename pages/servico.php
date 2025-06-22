<?php include 'array.php'; // o arquivo com seu array ?>
<?php
  $numero_whatsapp = "554499444208"; // Número fixo com DDI + DDD
?>

<section class="servico">
  <h1 class="titulo titulo-mobile">Nossos Serviços</h1>
  <div class="row">
    <?php foreach ($servico as $servicoAtual): ?>
       <?php
        $mensagem = urlencode($servicoAtual['mensagem']);
        $link = "https://wa.me/{$numero_whatsapp}?text={$mensagem}";
       ?>
      <div class="col-md-4">
        <div class="card">
          <img src="<?= $servicoAtual['foto'] ?>" class="card-img-top" alt="<?= $servicoAtual['nome'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $servicoAtual['nome'] ?></h5>
            <p class="card-text"><?= $servicoAtual['descricao'] ?></p>
             <a href="<?= $link ?>" target="_blank" class="btn btn-primary d-block mx-auto">Agende agora pelo WhatsApp</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

     
</section>
