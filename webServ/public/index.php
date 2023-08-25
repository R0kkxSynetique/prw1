<!-- //todo /people
//todo /people/1
//todo return text and image


//todo /places
//todo /places/1450
//todo return text (city name(s)) && gps coordinates -->
<?php

require '../src/controller/router.php';

$request = $_SERVER['REQUEST_URI'];

route($request);



