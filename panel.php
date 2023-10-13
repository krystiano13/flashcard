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
    <link rel="stylesheet" href="./styles/panel.css?v=11"/>
</head>
<body>
    <main id="panel" class="row width-100 height-100 flex-col bg">
        <div id="user" class="col-4 col-xxl-12 height-50 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2 d-flex flex-col jc-center">
                <h1 class="width-75 font-head color-bg m-1 ml-6 f-xxl f-600">Name: User</h1>
                <h2 class="width-75 font-head color-bg m-1 ml-6 f-xl f-500">Joined: 12.10.2003</h2>
            </div>
        </div>
        <div id="stats" class="col-4 col-xxl-12 height-50 d-flex jc-center ai-center">
            <ul class="width-75 height-75 bg-primary br-rad-2 d-flex flex-col jc-center">
                <li class="color-bg font-other f-l m-1 ml-6">Decks created : 0</li>
                <li class="color-bg font-other f-l m-1 ml-6">Cards created : 0</li>
                <li class="color-bg font-other f-l m-1 ml-6">Cards swiped : 0</li>
                <li class="color-bg font-other f-l m-1 ml-6">Finished decks : 0</li>
            </ul>
        </div>
        <div id="decks" class="col-8 col-xxl-12 height-100 d-flex jc-center ai-center">
            <div class="width-75 height-75 bg-primary br-rad-2"></div>
        </div>
    </main>
</body>
</html>
