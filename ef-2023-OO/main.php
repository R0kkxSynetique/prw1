<?php

$book1 = new Book("Le seigneur des anneaux", "J.R.R. Tolkien", "Fantasy");
$book2 = new Book("Harry Potter", "J.K. Rowling", "Fantasy");
$book3 = new Book("Le petit prince", "Antoine de Saint-Exupéry", "Fantasy");
$book4 = new Book("Le hobbit", "J.R.R. Tolkien", "Fantasy");
$book5 = new Book("The book of truth", "Osho", "Philosophy");
$book6 = new Book("The art of war", "Sun Tzu", "Philosophy");
$book7 = new Book("The prince", "Niccolò Machiavelli", "Philosophy");
$book8 = new Book("The republic", "Plato", "Philosophy");
$book9 = new Book("The book of five rings", "Miyamoto Musashi", "Philosophy");
$book10 = new Book("The art of love", "Ovid", "Philosophy");
$book11 = new Book("The art of happiness", "Dalai Lama", "Philosophy");
$book12 = new Book("The art of thinking clearly", "Rolf Dobelli", "Philosophy");
$book13 = new Book("Man's search for meaning", "Viktor E. Frankl", "Philosophy");
$book14 = new Book("Human, all too human", "Friedrich Nietzsche", "Philosophy");
$book15 = new Book("The myth of Sisyphus", "Albert Camus", "Philosophy");

$books = [$book1, $book2, $book3, $book4, $book5, $book6, $book7, $book8, $book9, $book10, $book11, $book12, $book13, $book14, $book15];

$video1 = new Video("The Matrix", "Lana Wachowski", "Science-fiction");
$video2 = new Video("The Matrix reloaded", "Lana Wachowski", "Science-fiction");
$video3 = new Video("The Matrix revolutions", "Lana Wachowski", "Science-fiction");
$video4 = new Video("The Lord of the Rings: The Fellowship of the Ring", "Peter Jackson", "Fantasy");
$video5 = new Video("The Lord of the Rings: The Two Towers", "Peter Jackson", "Fantasy");
$video6 = new Video("The Lord of the Rings: The Return of the King", "Peter Jackson", "Fantasy");
$video7 = new Video("The Hobbit: An Unexpected Journey", "Peter Jackson", "Fantasy");
$video8 = new Video("The Hobbit: The Desolation of Smaug", "Peter Jackson", "Fantasy");
$video9 = new Video("The Hobbit: The Battle of the Five Armies", "Peter Jackson", "Fantasy");
$video10 = new Video("Harry Potter and the Philosopher's Stone", "Chris Columbus", "Fantasy");
$video11 = new Video("Harry Potter and the Chamber of Secrets", "Chris Columbus", "Fantasy");
$video12 = new Video("Harry Potter and the Prisoner of Azkaban", "Alfonso Cuarón", "Fantasy");
$video13 = new Video("Harry Potter and the Goblet of Fire", "Mike Newell", "Fantasy");
$video14 = new Video("Harry Potter and the Order of the Phoenix", "David Yates", "Fantasy");
$video15 = new Video("Harry Potter and the Half-Blood Prince", "David Yates", "Fantasy");

$videos = [$video1, $video2, $video3, $video4, $video5, $video6, $video7, $video8, $video9, $video10, $video11, $video12, $video13, $video14, $video15];

$mediaLibrary = new MediaLibrary($books, $videos);

$user1 = new User("Benjamin", "Fontana", "benjamin.fontana@eduvaud.ch");
$user2 = new User("Cyprien", "Jaquier", "cyprien.jaquier@eduvaud.ch");


// ? Test 1 : Rent a signle book
$mediaLibrary->rentItem($user1, $book1);

print_r($mediaLibrary->rentedBooks);

// ? Test 2 : Rent a signle video
$mediaLibrary->rentItem($user1, $video1);

// ? Test 3 : Rent multiple books
$mediaLibrary->rentItem($user1, [$book2, $book3, $book4]);

// ? Test 4 : Rent multiple videos
$mediaLibrary->rentItem($user2, [$video2, $video3, $video4]);

// ? Test 6 : Return a signle book
$mediaLibrary->returnItem($user1, $book1);

// ? Test 7 : Return a signle video
$mediaLibrary->returnItem($user1, $video1);

// ? Test 8 : Return multiple books
$mediaLibrary->returnItem($user2, [$book2, $book3, $book4]);

// ? Test 9 : Return multiple videos
$mediaLibrary->returnItem($user2, [$video2, $video3, $video4]);
