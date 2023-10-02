<h1><?= $data['title'] ?? 'Images' ?></h1>
<ul>
  <?php foreach ($data['images'] as $image): ?>
    <li><img src="<?= $image ?>"></li>
  <?php endforeach; ?>
</ul>
