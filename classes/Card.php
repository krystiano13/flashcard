<?php

namespace App;
require_once "Database.php";

use App\Database;

class Card
{
    private int $deckId;
    private string $cardFirstSide;
    private string $cardSecondSide;

    public function getOneCard(string $id)
    {
        if (!$id) {
            return array();
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con->prepare(
            "SELECT * FROM cards WHERE id=:id"
        );
        $query->bindValue(':id', $id);
        $query->execute();

        if ($query->rowCount() <= 0) return array();
        else {
            $result = $query->fetchAll();
            return array(
                "id" => $result[0]['id'],
                "one" => $result[0]['one_side'],
                "second" => $result[0]['second_side']
            );
        }

    }

    public function updateCard(string $id)
    {
        if (!$id) {
            echo json_encode(['status' => false]);
            return;
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con->prepare(
            "UPDATE cards set deck_id=:did, one_side=:os, second_side=:ss WHERE id=:id"
        );

        if (
            $query->execute([
                ':did' => $this->deckId,
                ':os' => $this->cardFirstSide,
                ':ss' => $this->cardSecondSide,
                ':id' => $id
            ])
        ) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteCard(string $id)
    {
        if (!$id) {
            echo json_encode(['status' => false]);
            return;
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con->prepare("DELETE FROM cards WHERE id=:id");
        $query->bindValue(":id", $id);

        if ($query->execute()) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function showCards()
    {
        if (!$this->deckId) {
            header('Location: /flashcard/panel.php');
            return;
        }

        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query = $con->prepare(
            "SELECT * FROM cards WHERE deck_id=:id"
        );

        $query->bindValue(':id', $this->deckId);
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

public function addCard():Card
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

            $query2 = $con -> prepare("UPDATE decks SET cards=cards+1 WHERE id=:id");
            $query2 -> bindValue(':id', $this -> deckId);
            $query2 -> execute();

            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }

        return $this;
    }

    public function countCards(string $username) {
        $database = new Database();
        $database->connect();
        $con = $database->connection;

        $query3 = $con -> prepare("UPDATE userdata SET cards=cards+1 WHERE username=:username");
        $query3 -> bindValue(':username', $username);
        $query3 -> execute();
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