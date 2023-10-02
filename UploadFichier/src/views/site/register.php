<?php $title = "Inscription" ?>
<div class="col-md-4 col-md-offset-4">
  <form class="form-horizontal" role="form" method="post">
    <h1 class="text-center">Inscription</h1>
    <div class="form-group <?= isset($data['username_error']) ? 'has-error' : '' ?>">
      <label for="username" class="control-label">Identifiant</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Identifiant" value="<?= $data['username'] ?? '' ?>">
      <?php if ($data['username_error'] ?? null): ?>
        <span class="help-block"><?= $data['username_error'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form-group <?= isset($data['password_error']) ? 'has-error' : '' ?>">
      <label for="password" class="control-label">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
      <label for="password_confirmation" class="control-label">Confirmation du mot de passe</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmation du mot de passe">
      <?php if ($data['password_error'] ?? null): ?>
        <span class="help-block"><?= $data['password_error'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form-group <?= isset($data['name_error']) ? 'has-error' : '' ?>">
      <label for="username" class="control-label">Nom</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $data['name'] ?? '' ?>">
      <?php if ($data['name_error'] ?? null): ?>
        <span class="help-block"><?= $data['name_error'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-lg btn-success btn-block">M'inscrire</button>
    </div>
  </form>
</div>
