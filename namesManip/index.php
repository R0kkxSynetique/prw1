<?php

$usersFile = "SI-T1a.txt";

$users  = file($usersFile, FILE_IGNORE_NEW_LINES);

$validUsers = [];

function getUsersByFirstLastnameLetter($letter, $users)
{
    return array_filter($users, function ($user) use ($letter) {
        if ($user[0][0] == $letter) {
            $user = explode(" ", $user);
            return $user[1];
        }
    });
}

function getUsersLastname($users)
{
    return array_map(function ($user) {
        $user = explode(" ", $user);
        return $user[1];
    }, $users);
}

function formatArrayToString($users)
{
    return implode(" - ", $users);
}

$validUsers = getUsersByFirstLastnameLetter("J", $users);
$validUsers = getUsersLastname($validUsers);
$validUsers = formatArrayToString($validUsers);


echo $validUsers;

