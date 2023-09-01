<?php

function getResource($ressourceId = NULL, $ressourceType)
{
    $accepted_type = $_SERVER["HTTP_ACCEPT"];

    $accepted_type = explode(",", $accepted_type);

    switch ($accepted_type[0]) {
        case "application/json":
            header('Content-Type: application/json');
            if (!$ressourceId) return getResourcesList($ressourceType);
            return getResourceJson($ressourceId, $ressourceType);

        case "image/png":
            header('Content-Type: image/png');
            return getResourceImage($ressourceId);

        case "application/x-gps":
            $url = getResourceGPS($ressourceId);
            header("Location: $url");
            break;

        case "*/*":
            header('Content-Type: application/json');
            if (!$ressourceId) return getResourcesList($ressourceType);
            return getResourceJson($ressourceId, $ressourceType);

        default:
            http_response_code(406);
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

    if (file_exists($path)) {
        return file_get_contents($path);
    } else {
        http_response_code(404);
    }
}

function getResourceImage($ressourceId)
{
    $path = "../src/data/people/$ressourceId/avatar.png";

    if (file_exists($path)) {
        echo file_get_contents($path);
    } else {
        http_response_code(404);
    }
}

function getResourceGPS($ressourceId)
{
    $path = "../src/data/cities/$ressourceId/gps.json";

    if (file_exists($path)) {
        $data = json_decode(file_get_contents($path));

        $longitude = $data->longitude;
        $latitude = $data->latitude;

        $url = "https://www.google.com/maps/place/$longitude+$latitude";

        return $url;
    } else {
        http_response_code(404);
    }
}

function getResourcesList($ressourceType)
{
    switch ($ressourceType) {
        case "people":
            $path = "../src/data/people/*";
            $file = "/person.json";
            break;

        case "cities":
            $path = "../src/data/cities/*";
            $file = "/city.json";
            break;
    }
    foreach (glob($path) as $filename) {
        $ressources[] = json_decode(file_get_contents($filename . $file));
    }
    return json_encode($ressources);
}
