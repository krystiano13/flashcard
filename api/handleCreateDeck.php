<?php

require_once '../classes/Deck.php';
use App\Deck;

session_start();

$username = $_SESSION['username'];
$deckName = '';

if(isset($_POST['deckName'])) $deckName = $_POST['deckName'];

$deck = new Deck($username, $deckName);
$deck -> createDeck();