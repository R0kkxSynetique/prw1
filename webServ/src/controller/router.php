<?php

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
    switch ($request) {
        case '/people/1':
            echo "person";
            break;
        case '/cities/1':
            echo "city";
            break;
        default:
            echo "404";
            break;
    }
}
