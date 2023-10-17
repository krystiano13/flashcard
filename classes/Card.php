<?php

namespace App;
require_once "Database.php";

use App\Database;

class Card
{
    private int $deckId;
    private string $cardFirstSide;
    private string $cardSecondSide;

    public function showCards() {
        if(!$this->deckId) {
            echo json_encode(['status' => false]);
            return;
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con -> prepare(
            "SELECT * FROM cards WHERE deck_id=:id"
        );

        $query -> bindValue(':id', $this->deckId);
        $query -> execute();

        echo json_encode(['status' => true, 'data' => $query -> fetchAll()]);
    }

    public function addCard()
    {
        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con->prepare(
            "INSERT INTO cards VALUES(NULL,:id, :one, :two)"
        );

        $query->bindValue(":id", $this->deckId);
        $query->bindValue(":one", $this->cardFirstSide);
        $query->bindValue(":two", $this->cardSecondSide);

        if ($query->execute()) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function setDeckId(int $id): Card
    {
        $this->deckId = $id;
        return $this;
    }

    public function setCardFirstSide(string $input): Card
    {
        $this->cardFirstSide = $input;
        return $this;
    }

    public function setCardSecondSide(string $input): Card
    {
        $this->cardSecondSide = $input;
        return $this;
    }
}