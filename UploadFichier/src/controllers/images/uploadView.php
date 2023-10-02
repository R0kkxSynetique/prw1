<?php

require_once SOURCE_DIR . '/models/image.php';

$bag['data'] = ['categories' => getAllCategories()];
$bag['view'] = 'views/images/uploadImages';

return $bag;