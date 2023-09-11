<?php

$usersFile = "SI-T1a.txt";
$lastnameLetter = "J";

$users  = file($usersFile, FILE_IGNORE_NEW_LINES);

echo array_reduce(
    array_map(fn ($user) => explode(" ", $user)[1], array_filter(
        $users,
        fn ($user) => $user[0][0] == $lastnameLetter
    )),
    fn ($carry, $item) => $carry === "" ? $item : $carry . " - " . $item,
    ""
);