<?php

require_once SOURCE_DIR.'/models/image.php';

$bag['data'] = ['images' => findImages(null, $bag['username']), 'title' => "Images de ".$bag['username']];
$bag['view'] = 'views/images/index';
return $bag;
