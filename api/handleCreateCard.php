<?php

session_start();

if(
    !isset($_SESSION['deck']) ||
    !isset($_POST['oneSide']) ||
    !isset($_POST['secondSide']) ||
    !isset($_SESSION['username'])
) {
    echo json_encode(['status' => false]);
}

require_once "../classes/Card.php";
use App\Card;

$deckId = $_SESSION['deck'];
$cardOneSide = $_POST['oneSide'];
$cardSecondSide = $_POST['secondSide'];

$card = new Card();
$card
    ->setDeckId((int)$deckId)
    ->setCardFirstSide($cardOneSide)
    ->setCardSecondSide($cardSecondSide)
    ->addCard()
    ->countCards($_SESSION['username']);