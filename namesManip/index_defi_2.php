<?php

$usersFile = "SI-T1a.txt";
$firstnameLetter = "N";

$users  = file($usersFile, FILE_IGNORE_NEW_LINES);

echo join(
    " - ",
    array_map(
        fn ($user) => $user[0],
        array_filter(
            array_map(
                fn ($user) => explode(" ", $user),
                $users
            ),
            fn ($user) => $user[1][0] == $firstnameLetter
        )
    )
);
