<?php

function getResource($ressourceId=NULL, $ressourceType)
{
    switch ($_SERVER["CONTENT_TYPE"]) {
        case "application/json":
            header('Content-Type: application/json');
            if (!$ressourceId) return getResourcesList($ressourceType);
            return getResourceJson($ressourceId, $ressourceType);

        case "image/png":
            header('Content-Type: image/png');
            return getResourceImage($ressourceId);

        case "application/x-gps":
            header('Content-Type: application/x-gps');
            return getResourceGPS($ressourceId);

        case "*/*":
            header('Content-Type: application/json');
            if (!$ressourceId) return getResourcesList($ressourceType);
            return getResourceJson($ressourceId, $ressourceType);

        default:
            header('Content-Type: application/json');
            if (!$ressourceId) return getResourcesList($ressourceType);
            return getResourceJson($ressourceId, $ressourceType);
            break;
    }
}

function getResourceJson($ressourceId, $ressourceType)
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

function getResourceImage($ressourceId)
{
    echo file_get_contents("../src/data/people/$ressourceId/avatar.png");
}

function getResourceGPS($ressourceId)
{
    return file_get_contents("../src/data/cities/$ressourceId/gps.json");
}

function getResourcesList()
{
    foreach (glob("../src/data/people/*") as $filename) {
        $ressources[] = json_decode(file_get_contents($filename . "/person.json"));
    }
    return json_encode($ressources);
}
