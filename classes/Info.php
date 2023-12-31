<?php

namespace App;
require_once 'Database.php';

use App\Database;
class Info
{
    private string $username;
    public string $createdAt = '0000-00-00';

    public int $id = 0;
    public int $cards = 0;
    public int $decks = 0;
    public int $decksSolved = 0;
    public int $cardsSolved = 0;
    public array $decksInfo = [];

    public function __invoke(string $username)
    {
        $this->username = $username;

        $database = new Database();
        $database -> connect();

        $query = $database -> connection -> prepare(
            "SELECT id,created_at, decks, cards, decks_solved, cards_solved FROM userdata WHERE username=:username"
        );

        $query -> bindValue(':username', $this->username);

        if($query -> execute()) {
            $result = $query -> fetchAll();
            $this->id = $result[0]['id'];
            $this->createdAt = $result[0]['created_at'];
            $this->decks = $result[0]['decks'];
            $this->cards = $result[0]['cards'];
            $this->cardsSolved = $result[0]['cards_solved'];
            $this->decksSolved = $result[0]['decks_solved'];
        }

        $this->getDecksInfo();
    }

    private function getDecksInfo() {
        $database = new Database();
        $database->connect();

        $query = $database->connection->prepare(
            "SELECT id,deckName, cards FROM decks WHERE username=:username"
        );

        $query->bindValue(':username', $this->username);

        if($query->execute()) {
            $this->decksInfo = $query -> fetchAll();
        }
    }
}