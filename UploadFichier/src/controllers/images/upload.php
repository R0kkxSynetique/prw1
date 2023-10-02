<?php

require_once SOURCE_DIR . '/models/image.php';

$bag['data'] = [];

$category = trim($_POST['categories']);
$image    = $_FILES['image'];

if (!in_array($category, getAllCategories())) {
    $bag['data']['category_error'] = "La catégorie n'existe pas";
}

if ($image['error'] != UPLOAD_ERR_OK) {
    $bag['data']['image_error'] = "Une erreur est survenue lors de l'upload de l'image";
}

if (empty($bag['data'])) {
    uploadImage($category, $bag['current_user']['name'], $image);

    $bag['headers'] = ['Location' => '/images'];
    return $bag;
}

$bag['data'] = ['categories' => getAllCategories()];
$bag['view'] = 'views/images/uploadImages';

return $bag;
