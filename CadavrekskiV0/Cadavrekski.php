<?php

$PDO = new PDO(getenv('PDO_DSN', true), getenv('PDO_USERNAME', true), getenv('PDO_PASSWORD', true));

if (count($argv) == 1) {
    $statement = $PDO->query("SELECT body FROM verses");

    $lines = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    foreach ($lines as $line) {
        echo $line."\n";
    }
    exit(0);
}

$statement = $PDO->prepare("INSERT INTO verses (body) VALUES (:item)");
$statement->execute(['item' => $argv[1]]);

