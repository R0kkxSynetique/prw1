<?php

require_once SOURCE_DIR.'/models/image.php';

$bag['data'] = ['images' => findImages($bag['category'], null), 'title' => "Images de la catégorie ".$bag['category']];
$bag['view'] = 'views/images/index';
return $bag;
