<?php
require '../src/model/ressourceHandler.php';

function route($request)
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            get($request);
            break;

        default:
            echo "404";
            break;
    }
}

function get($request)
{
    $request = explode("/", $request);
    switch ($request[1]) {
        case 'people':
            $content = getRessources($request[2],"people");
            response($content);
            break;

        case 'cities':
            $content = getRessources($request[2], "cities");
            response($content);
            break;
            
        default:
            echo "404";
            break;
    } 
}

function response($response)
{
    echo $response;
}
