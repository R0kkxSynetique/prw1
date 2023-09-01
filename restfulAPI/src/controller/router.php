<?php
require '../src/model/ressourceHandler.php';

function route($request)
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            get($request);
            break;

        default:
            http_response_code(500);
            break;
    }
}

function get($request)
{
    $request = explode("/", $request);

    $resourceType = $request[1];
    $resourceId = $request[2] ?? NULL;


    switch ($resourceType) {
        case 'people':
            $content = getResource($resourceId, $resourceType);
            response($content);
            break;

        case 'cities':
            $content = getResource($resourceId, $resourceType);
            response($content);
            break;

        default:
            http_response_code(500);
            break;
    }
}

function response($response)
{
    echo $response;
}
