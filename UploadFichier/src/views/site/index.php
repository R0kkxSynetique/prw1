<?php $title = "Accueil" ?>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Bienvenue sur PicShare</h1>
    <p>Le partage facile de galleries d'images</p>
  </div>
</div>

<?php if ($bag['current_user'] ?? null): ?>
    <a class="btn btn-primary btn-lg center-block" href="<?= route('images') ?>">Montre moi les images</a>
<?php endif; ?>
