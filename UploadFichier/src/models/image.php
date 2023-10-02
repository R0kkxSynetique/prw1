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

function uploadImage($category, $username, $image)
{
    $target_dir = PICTURES_DIR . "/$username/$category";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . '/' . basename($image['name']);
    move_uploaded_file($image['tmp_name'], $target_file);
}