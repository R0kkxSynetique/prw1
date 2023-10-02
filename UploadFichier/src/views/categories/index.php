<h1>Les catégories</h1>
<ul>
  <?php foreach ($data['categories'] as $category): ?>
    <li><a href="<?= route('categories/images', $category) ?>"><?= $category ?></a></li>
  <?php endforeach; ?>
</ul>
