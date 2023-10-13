<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flashcards</title>
    <meta name="keywords" content="Flashcard, app, learn, study">
    <meta name="author" content="Krystian Zieja">
    <meta name="description" content="Simple flashcard app">
    <link rel="stylesheet" href="./styles/micro-css-framework/index.css"/>
    <link rel="stylesheet" href="./styles/login.css?v=11"/>
</head>
<body>
    <main class="row width-100 height-100 flex-col">
        <div id="user" class="col-6 col-xxl-12 height-50"></div>
        <div id="stats" class="col-6 col-xxl-12 height-50"></div>
        <div id="decks" class="col-6 col-xxl-12 height-100"></div>
    </main>
</body>
</html>
