<?php

require_once SOURCE_DIR.'/models/image.php';

$namePattern = '*'.preg_replace("/\W+/", '*', $_GET['q']).'*';

$bag['data'] = ['images' => findImages(null, null, $namePattern)];
$bag['view'] = 'views/images/index';
return $bag;
