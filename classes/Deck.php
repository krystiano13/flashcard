<?php

namespace App;
require_once 'Database.php';

use App\Database;

class Deck
{
    private string $username;
    private string $deckName;

    public function __construct(string $username, string $name)
    {
        $this -> username = $username;
        $this -> deckName = $name;
    }

    public function createDeck() {
        $database = new Database();
        $database -> connect();
        $con = $database -> connection;

        $query = $con -> prepare(
            "INSERT INTO decks VALUES(NULL, :username, :name, 0)"
        );

        $query -> bindValue(':username', $this -> username);
        $query -> bindValue(':name', $this -> deckName);

        if($query -> execute()) {
            echo json_encode(['status' => true]);
        }
        else {
            echo json_encode(['status' => false]);
        }
    }
}