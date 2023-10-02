<?php $title = "Connexion" ?>
<div class="col-md-4 col-md-offset-4">
  <form class="form-horizontal" role="form" method="post">
    <h1 class="text-center">Connexion</h1>
    <div class="form-group <?= isset($data['username_error']) ? 'has-error' : '' ?>">
      <label for="username" class="control-label">Identifiant</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Identifiant">
      <?php if ($data['username_error'] ?? null): ?>
        <span class="help-block"><?= $data['username_error'] ?></span>
      <?php endif; ?>
    </div>
    <div class="form-group <?= isset($data['password_error']) ? 'has-error' : '' ?>">
      <label for="password" class="control-label">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
      <?php if ($data['password_error'] ?? null): ?>
        <span class="help-block"><?= $data['password_error'] ?></span>
      <?php endif; ?>
    </div>
    <?php if ($data['login_error'] ?? null): ?>
      <div class="form-group has-error">
        <span class="help-block"><?= $data['login_error'] ?></span>
      </div>
    <?php endif; ?>
    <div class="form-group">
      <button type="submit" class="btn btn-lg btn-success btn-block">Connexion</button>
    </div>
  </form>
</div>
