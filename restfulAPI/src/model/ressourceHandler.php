<?php

function getRessources($ressourceId, $ressourceType)
{
    switch ($_SERVER["CONTENT_TYPE"]) {
        case "application/json":
            header('Content-Type: application/json');
            return getRessourcesJson($ressourceId, $ressourceType);

        case "image/png":
            header('Content-Type: image/png');
            return getRessourcesImage($ressourceId);

        case "application/gps":
            header('Content-Type: application/gps');
            return getRessourcesGPS($ressourceId);

        default:
            http_response_code(500);
            break;
    }
}

function getRessourcesJson($ressourceId, $ressourceType)
{
    switch ($ressourceType) {
        case "people":
            $path = "../src/data/$ressourceType/$ressourceId/person.json";
            break;

        case "cities":
            $path = "../src/data/$ressourceType/$ressourceId/city.json";
            break;
    }
    return file_get_contents($path);
}

function getRessourcesImage($ressourceId)
{
    echo file_get_contents("../src/data/people/$ressourceId/avatar.png");
}

function getRessourcesGPS($ressourceId)
{
    return file_get_contents("../src/data/cities/$ressourceId/gps.json");
}
