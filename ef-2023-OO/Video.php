<?php

class Video extends Item
{
    private $title;
    private $author;
    private $category;

    public function __construct($title, $author, $category)
    {
        $this->title = $title;
        $this->author = $author;
        $this->category = $category;
    }
}
