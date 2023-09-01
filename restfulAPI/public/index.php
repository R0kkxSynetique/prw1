<?php

require '../src/controller/router.php';

set_error_handler(fn($x) => http_response_code(500));

$request = $_SERVER['REQUEST_URI'];

route($request);