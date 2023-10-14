<?php
    session_start();

    if(!isset($_SESSION['deck'])) {
        header('Location: /flashcard/panel.php');
    }
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
    <link rel="stylesheet" href="./styles/deck.css?v=11"/>
</head>
<body>
    <main class="width-100 height-100 d-flex jc-center ai-center">
        <div id="start" class="el bg-hover bg-accent-hover d-flex br-rad-2 jc-center ai-center font-head m-2 bg-primary color-bg f-600 f-xl c-pointer">
            Start Learning
        </div>
        <div id="add" class="el bg-hover bg-accent-hover d-flex br-rad-2 jc-center ai-center font-head m-2 bg-primary color-bg f-600 f-xl c-pointer">
            Add/Remove Cards
        </div>
        <div id="back" class="el bg-hover bg-accent-hover d-flex br-rad-2 jc-center ai-center font-head m-2 bg-primary color-bg f-600 f-xl c-pointer">
            Go Back
        </div>
    </main>
</body>
</html>