<?php

namespace App\classes;
require_once 'Database.php';

use App\Database;
class Info
{
    public string $username;

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
            echo json_encode(['status' => true, 'data' => $query -> fetchAll()]);
        }
        else {
            echo json_encode(['status' => false]);
        }
    }

}