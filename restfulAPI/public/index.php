<?php

require '../src/controller/router.php';

$request = $_SERVER['REQUEST_URI'];

route($request);