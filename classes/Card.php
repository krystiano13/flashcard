<?php

namespace App;
require_once "Database.php";

use App\Database;

class Card
{
    private int $deckId;
    private string $cardFirstSide;
    private string $cardSecondSide;

    public function updateCard(int $id) {
        if(!$id) {
            echo json_encode(['status' => false]);
            return;
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con -> prepare(
            "UPDATE cards set deck_id=:did, one_side=:os, second_side=:ss WHERE id=:id"
        );

        if(
            $query -> execute([
                ':did' => $this -> deckId,
                ':os' => $this -> cardFirstSide,
                ':ss' => $this -> cardSecondSide,
                ':id' => $id
            ])
        ) {
            echo json_encode(['status' => true]);
        }
        else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteCard(string $id) {
        if(!$id) {
            echo json_encode(['status' => false]);
            return;
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con -> prepare("DELETE FROM cards WHERE id=:id");
        $query -> bindValue(":id", $id);

        if($query -> execute()) {
            echo json_encode(['status' => true]);
        }

        else {
            echo json_encode(['status' => false]);
        }
    }

    public function showCards() {
        if(!$this->deckId) {
            header('Location: /flashcard/panel.php');
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

        return $query -> fetchAll();
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