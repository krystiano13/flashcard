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

    public function deleteDeck(int $id) {
        if(!$id) {
            echo json_encode(['status' => false]);
            return;
        }

        $database = new Database();
        $database -> connect();
        $con = $database -> connection;

        $query = $con -> prepare(
            "DELETE FROM decks WHERE id=:id"
        );

        $query -> bindValue(":id", $id);

        if($query -> execute()) {
            echo json_encode(['status' => true]);
        }

        else {
            echo json_encode(['status' => false]);
        }
    }

    public function renameDeck(string $name, int $id) {
        $database = new Database();
        $database -> connect();
        $con = $database -> connection;

        if(!$name || !$id) {
            echo json_encode(['status' => false]);
            return;
        }

        $query = $con -> prepare(
            "UPDATE decks set deckName=:name WHERE id=:id"
        );

        $query -> bindValue(":name", $name);
        $query -> bindValue(":id", $id);

        if($query -> execute()) {
            echo json_encode(['status' => true]);
        }

        else {
            echo json_encode(['status' => false]);
        }
    }

    public function createDeck() {
        $database = new Database();
        $database -> connect();
        $con = $database -> connection;

        if(!$this->username || !$this->deckName) {
            echo json_encode(['status' => false]);
            return;
        }

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