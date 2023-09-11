<?php

$usersFile = "SI-T1a.txt";

$users  = file($usersFile, FILE_IGNORE_NEW_LINES);

$lettersNumber = intval($argv[1]);

$upperAlphaChar = join("",array_merge(range('A', 'Z')));
$lowerAlphaChar = join("",array_merge(range('a', 'z')));

$letters = str_split(substr($upperAlphaChar, 0, $lettersNumber) . substr($upperAlphaChar, 26-$lettersNumber, $lettersNumber) . substr($lowerAlphaChar, 0, $lettersNumber) . substr($lowerAlphaChar, 26-$lettersNumber, $lettersNumber));

echo join(
    " - ",
    array_map(
        fn ($user) => $user[1],
        array_filter(
            array_map(
                fn ($user) => explode(" ", $user),
                $users
            ),
            fn ($user) => in_array($user[0][0], $letters)
        )
    )
);