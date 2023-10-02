<h1>Les utilisateurs</h1>
<ul>
  <?php foreach ($data['users'] as $user): ?>
    <li><a href="<?= route('users/images', $user['username']) ?>"><?= $user['name'] ?></a></li>
  <?php endforeach; ?>
</ul>
