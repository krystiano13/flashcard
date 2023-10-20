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
    <?php include "./components/head.php"; ?>
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
        <div id="addCard"
             class="d-flex jc-center ai-center c-pointer cardElement f-s br-rad-2 width-50 bg-secondary color mt-2 font-other f-400 m-1 p-2">
            <label class="max-width-50 text-center">+</label>
        </div>
    </main>
</body>
</html>