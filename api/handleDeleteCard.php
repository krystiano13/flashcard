<?php

session_start();

if(
    !isset($_POST['oneSide']) ||
    !isset($_POST['secondSide']) ||
    !isset($_POST['id']) ||
    !isset($_SESSION['deck'])
) {
    echo json_encode(['status' => false]);
    return;
}

require_once "../classes/Card.php";
use App\Card;
$card = new Card();
$card
    ->setDeckId($_SESSION['deck'])
    ->setCardFirstSide($_POST['oneSide'])
    ->setCardSecondSide($_POST['secondSide'])
    ->deleteCard($_POST['id']);