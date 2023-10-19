<?php
session_start();

if(
    !isset($_POST['id']) ||
    !isset($_POST['oneSide']) ||
    !isset($_POST['secondSide']) ||
    !isset($_SESSION['deck'])
) echo json_encode(['status' => false]);

require_once "../classes/Card.php";
use App\Card;
$card = new Card();

$card
    -> setDeckId($_SESSION['deck'])
    -> setCardSecondSide($_POST['secondSide'])
    -> setCardFirstSide($_POST['oneSide'])
    -> updateCard($_POST['id']);