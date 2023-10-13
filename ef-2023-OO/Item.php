<?php

abstract class Item
{
    private $title;
    private $author;
    private $category;

    abstract public function __construct($title, $author, $category);
}
