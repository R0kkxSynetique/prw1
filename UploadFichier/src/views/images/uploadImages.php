<?php $title = "Upload" ?>
<div class="col-md-4 col-md-offset-4">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <h1 class="text-center">Upload</h1>
        <div class="form-group">
            <label for="categories" class="control-label">Catégories</label>
            <select id="categories" name="categories" required>
                <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach ?>
            </select>
            <?php if ($data['category_error'] ?? null) : ?>
                <span class="help-block"><?= $data['category_error'] ?></span>
            <?php endif; ?>
        </div>
        <div>
            <input type="file" name="image" accept="image/jpeg,image/png,image/gif,image/svg+xml" required>
        </div>
        <?php if ($data['image_error'] ?? null) : ?>
            <span class="help-block"><?= $data['image_error'] ?></span>
        <?php endif; ?>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success btn-block">Envoyer</button>
        </div>
    </form>
</div>