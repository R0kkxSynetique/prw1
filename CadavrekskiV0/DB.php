<?php

class DB
{
    private $PDO;

    public function __construct()
    {
        $this->PDO = new PDO(getenv('PDO_DSN', true), getenv('PDO_USERNAME', true), getenv('PDO_PASSWORD', true));
    }

    public function getVerses()
    {
        $statement = $this->PDO->query("SELECT body FROM verses");

        return $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public function addVerse($verse)
    {
        $statement = $this->PDO->prepare("INSERT INTO verses (body) VALUES (:item)");
        $statement->execute(['item' => $verse]);
    }
}