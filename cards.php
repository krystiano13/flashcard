<?php
session_start();

if(!isset($_SESSION['deck'])) {
    header('Location: /flashcard/panel.php');
    return;
}

require_once "./classes/Card.php";
use App\Card;

$id = $_SESSION['deck'];
$card = new Card();
    $result = (array)$card -> setDeckId($id) -> showCards();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flashcards</title>
    <meta name="keywords" content="Flashcard, app, learn, study">
    <meta name="author" content="Krystian Zieja">
    <meta name="description" content="Simple flashcard app">
    <link rel="stylesheet" href="./styles/micro-css-framework/index.css"/>
    <link rel="stylesheet" href="./styles/cards.css?v=1" />
    <script defer src="dist/cards.js"></script>
</head>
<body>
    <header class="width-100 bg-primary color-bg d-flex ai-center jc-center font-head f-s">
        <h1>Deck Name: <?php echo $_SESSION['deckName']; ?> | User : <?php echo $_SESSION['username'] ?></h1>
    </header>
    <main class="width-100 d-flex flex-col ai-center">
        <?php
            require_once "./modules/cardList.php";
            foreach($result as $item) {
                echo generateCardListItem($item['one_side'], $item['id']);
            }
        ?>
    </main>
</body>
</html>