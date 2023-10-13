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
    <main id="panel" class="row width-100 height-100 flex-col bg">
        <div id="user" class="col-6 col-xxl-12 height-50 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2"></div>
        </div>
        <div id="stats" class="col-6 col-xxl-12 height-50 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2"></div>
        </div>
        <div id="decks" class="col-6 col-xxl-12 height-100 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2"></div>
        </div>
    </main>
</body>
<style>
    body {
        overflow-x : hidden;
    }

    #panel {
        @media screen and (max-width: 992px) {
            height : 200%;
            flex-wrap: nowrap;
        }
    }
</style>
</html>
