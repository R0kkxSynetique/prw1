<?php

define('USERS_DATA_PATHNAME', BASE_DIR.'/data/users.json');

/**
 ** User:
 **   username: string  User identifier
 **   name:     string  Display name
 **   password: string  Hashed password
 **
 **/

function findUser($username)
{
    // Read the user.dat file for the passed $username
    try {
        return json_decode(file_get_contents(USERS_DATA_PATHNAME), true)[$username] ?? null;
    }
    catch (Exception $e) {
        // Any error will return a null object, so asking for a non existant user throws a PATH_NOT_FOUND error thus returns null.
        return null;
    }
}

function saveUser($user)
{
    $username = $user['username'];

    $allUsers = getAllUsers();
    $allUsers[$username] = array_merge($allUsers[$username] ?? [], $user);

    file_put_contents(USERS_DATA_PATHNAME, json_encode($allUsers));
}

function registerUser($user)
{
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
    saveUser($user);
}

function getAllUsers()
{
    try {
        return json_decode(file_get_contents(USERS_DATA_PATHNAME), true);
    }
    catch (Exception $e) {
        // The file does not yet exist, so there's no users
        return [];
    }
}
