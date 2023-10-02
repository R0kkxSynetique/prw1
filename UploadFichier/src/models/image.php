<?php

define('PICTURES_DIR', BASE_DIR.'/public/pictures');
define('PICTURES_URL', '/pictures');

function findImages($category, $username, $filename_pattern = '*')
{
    if (!$category) $category = "*";
    if (!$username) $username = "*";

    $paths = glob(PICTURES_DIR."/$username/$category/$filename_pattern");
    return array_map(function($item) {
        return str_replace(PICTURES_DIR, PICTURES_URL, $item);
    }, $paths);
}

function getAllCategories()
{
    return array_unique(array_map(function($path) { $parts = explode('/', $path); return end($parts); }, glob(PICTURES_DIR."/*/*")));
}
