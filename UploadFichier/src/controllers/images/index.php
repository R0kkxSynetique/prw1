<?php

require_once SOURCE_DIR.'/models/image.php';

$bag['data'] = ['images' => findImages(null, null)];
$bag['view'] = 'views/images/index';
return $bag;
