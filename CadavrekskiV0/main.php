<?php
// these env vars must be set. PDO_DSN, PDO_USERNAME, PDO_PASSWORD, STORAGE_FILE_PATH, STORAGE_SYSTEM
// STORAGE_SYSTEM can be FILE or DB
// STORAGE_FILE_PATH is the path to the file where the verses are stored

require './vendor/autoload.php';

Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();

require './Renderer.php';

switch (getenv('STORAGE_SYSTEM')) {
    case 'FILE':
        require './FileHelper.php';
        $storage = new FileHelper();
        break;
    case 'DB':
        require './DB.php';
        $storage = new DB();
        break;
}

$renderer = new Renderer();

if (count($argv) == 1) {
    $verses = $storage->getVerses();
    $renderer->render($verses);
    exit(0);
}

$storage->addVerse($argv[1]);
