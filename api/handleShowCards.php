<?php

session_start();

if(!isset($_SESSION['deck'])) {
    echo json_encode(['status' => false]);
    return;
}

require_once "../classes/Card.php";
use App\Card;

$id = $_SESSION['id'];

$card = new Card();
$card
    ->setDeckId((int)$id)
    ->showCards();