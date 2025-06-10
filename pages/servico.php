<section class="servico">
  <h2 class="titulo">Nossos Serviços</h2>
  <div class="row">
    <?php foreach ($servico as $servicoAtual): ?>
      <div class="col-md-4">
        <div class="card">
          <img src="<?= $servicoAtual['foto'] ?>" class="card-img-top" alt="<?= $s['nome'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $servicoAtual['nome'] ?></h5>
            <p class="card-text"><?= $servicoAtual['descricao'] ?></p>
            <a href="#" class="btn btn-primary">Agende Agora</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
