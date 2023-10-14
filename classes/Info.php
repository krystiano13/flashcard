<?php

namespace App;
require_once 'Database.php';

use App\Database;
class Info
{
    public string $username;
    public string $createdAt = '0000-00-00';

    public int $cards = 0;
    public int $decks = 0;
    public int $decksSolved = 0;
    public int $cardsSolved = 0;

    public function __invoke(string $username)
    {
        $this->username = $username;

        $database = new Database();
        $database -> connect();

        $query = $database -> connection -> prepare(
            "SELECT created_at, decks, cards, decks_solved, cards_solved FROM userdata WHERE username=:username"
        );

        $query -> bindValue(':username', $this->username);

        if($query -> execute()) {
            $result = $query -> fetchAll();
            $this->createdAt = $result[0]['created_at'];
            $this->decks = $result[0]['decks'];
            $this->cards = $result[0]['cards'];
            $this->cardsSolved = $result[0]['cards_solved'];
            $this->decksSolved = $result[0]['decks_solved'];
        }
    }

}