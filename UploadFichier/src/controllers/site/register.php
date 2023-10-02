<?php

require_once SOURCE_DIR.'/models/user.php';

$bag['data'] = [];

$username  = trim($_POST['username']);
$name      = trim($_POST['name']);
$password  = $_POST['password'];

// Validate fields
if (strlen($username) < 3) {
    $bag['data']['username_error'] = "Votre identifiant doit contenir au moins 3 caractères";
}
if (findUser($username)) {
    $bag['data']['username_error'] = "Votre identifiant est déjà pris";
}
if (strlen($password) < 8) {
    $bag['data']['password_error'] = "Votre mot de passe doit contenir au moins 8 caractères";
}
if ($password != $_POST['password_confirmation']) {
    $bag['data']['password_error'] = "Votre mot de passe et la confirmation ne correspondent pas";
}

// Valid?
if (empty($bag['data'])) {
    // Yep, register the user
    registerUser(compact('username', 'name', 'password'));

    $bag['headers'] = ['Location' => '/'];
    return $bag;
}

// Invalid, render the view
$bag['view'] = 'views/site/register';
$bag['data'] = array_merge($bag['data'], compact('username', 'name'));
return $bag;
