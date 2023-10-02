<?php

$bag['data'] = [];

$username = trim($_POST['username']);
$password = $_POST['password'];

// Validate fields
if (empty($username)) {
    $bag['data']['username_error'] = "Votre identifiant ne doit pas être vide";
}
if (empty($password)) {
    $bag['data']['password_error'] = "Votre mot de passe ne doit pas être vide";
}

// Valid?
if (empty($bag['data'])) {
    // Yep, login the user
    if (loginUser($username, $password)) {
        $bag['headers'] = ['Location' => '/'];
        return $bag;
    }
    $bag['data']['login_error'] = "Votre identifiant et/ou mot de passe sont erronés";
}

// Invalid, render the view
$bag['view'] = 'views/site/login';
return $bag;
