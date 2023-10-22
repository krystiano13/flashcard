<?php

session_start();
if(!isset($_SESSION['deck'])) {
    echo json_encode(['status' => false]);
}

require_once "../classes/Card.php";
use App\Card;
$card = new Card();
$card -> setDeckId($_SESSION['deck']);
$results = $card -> showCards();

echo json_encode(['status' => true, 'data' => $results]);

