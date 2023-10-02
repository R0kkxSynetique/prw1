<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? "Sans titre" ?> - PicShare</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/custom.css" rel="stylesheet">
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">PicShare</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        </ul>

        <div class="navbar-right">
          <ul class="nav navbar-nav">
          <?php if ($bag['current_user'] ?? null): ?>
            <li><div class="navbar-text"><?= $bag['current_user']['name'] ?></div></li>
            <li><form class="navbar-form" method="post" action="<?= route('logout') ?>"><button type="submit" class="btn btn-link navbar-link">Se déconnecter</button></form>
          <?php else: ?>
            <li><a href="<?= route('login') ?>" class="btn">Connexion</a></li>
          <?php endif; ?>
          </ul>
          <form class="navbar-form navbar-right" role="search" action="/search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Rechercher une image" name="q">
            </div>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
          </form>
        </div>
      </div><!--/.navbar-collapse -->
    </div>
  </div>

  <div class="container">
    <?= $content ?>
  </div>

  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>
