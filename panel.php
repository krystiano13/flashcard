<?php

namespace App;
require_once 'classes/Info.php';

use App\Info;

session_start();
if(!isset($_SESSION['username'])) {
    header('Location: /flashcard/index.php');
}

$user = $_SESSION['username'];

$info = new Info();
$info($user);

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
    <link rel="stylesheet" href="./styles/panel.css?v=11"/>
    <script defer src="dist/panel.js"></script>
</head>
<body>
    <main id="panel" class="row width-100 height-100 flex-col bg">
        <div id="user" class="col-4 col-xxl-12 height-50 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2 d-flex flex-col jc-center">
                <h1 class="width-75 font-head color-bg m-1 ml-6 f-xxl f-600">Name: <?php echo $user; ?></h1>
                <h2 class="width-75 font-head color-bg m-1 ml-6 f-xl f-500">Joined: <?php echo $info->createdAt; ?></h2>
                <button class="color-bg-hover bg-accent-hover c-pointer color bg-secondary f-500 br-none br-b-2 br-b-solid br-b-accent
                width-25 font-head p-1 pl-3 pr-3 m-1 ml-6" id="logoutBtn">Logout</button>
            </div>
        </div>
        <div id="stats" class="col-4 col-xxl-12 height-50 d-flex jc-center ai-center">
            <ul class="width-75 height-75 bg-primary br-rad-2 d-flex flex-col jc-center">
                <li class="color-bg font-other f-l m-1 ml-6">Decks created : <?php echo $info->decks; ?></li>
                <li class="color-bg font-other f-l m-1 ml-6">Cards created : <?php echo $info->cards; ?></li>
                <li class="color-bg font-other f-l m-1 ml-6">Cards swiped : <?php echo $info->cardsSolved; ?></li>
                <li class="color-bg font-other f-l m-1 ml-6">Finished decks : <?php echo $info->decksSolved; ?></li>
            </ul>
        </div>
        <div id="decks" class="col-8 col-xxl-12 height-100 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2">
                <h2 class="font-head color-bg f-xxl m-3 ml-6 mt-6">All decks:</h2>
                <div class="width-100 height-75 overflow-y-auto d-flex flex-col m-3 ml-6">
                    <?php
                    if(count($info->decksInfo) > 0) {
                        for ($i = 0; $i < count($info->decksInfo); $i++) {
                            echo "<p class='width-75 max-width-75 font-other color bg-secondary p-2 f-m f-500 c-pointer br-rad-2'>";
                            echo "{$info->decksInfo[$i]['deckName']} - cards : {$info->decksInfo[$i]['cards']}";
                            echo "</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
