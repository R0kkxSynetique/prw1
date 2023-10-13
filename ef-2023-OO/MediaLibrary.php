<?php

class MediaLibrary
{
    private $books = [];
    private $videos = [];
    public $rentedBooks = [];
    public $rentedVideos = [];

    public function __construct(array $books, array $videos)
    {
        $this->books = $books;
        $this->videos = $videos;
    }

    public function rentItem(User $user, $item)
    {
        if ($item instanceof Book) {
            array_push($this->rentedBooks[], $item);
        } else if ($item instanceof Video) {
            array_push($this->rentedVideos[], $item);
        } else {
            throw new Exception("Media type not supported");
        }
    }

    public function returnItem(User $user, $item)
    {
        if ($item instanceof Book) {
            array_pop($this->rentedBooks);
        } else if ($item instanceof Video) {
            array_pop($this->rentedVideos);
        } else {
            throw new Exception("Media type not supported");
        }
    }

}
