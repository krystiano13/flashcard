<?php session_start() ?>

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
<main class="width-100 height-100 d-flex jc-center ai-center bg">
    <form id="form" method="post" class="d-flex flex-col ai-center jc-center bg-primary p-4 pt-6 pb-6 br-rad-1">
        <input id="usernameInput"
               class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
               type="text" name="username" placeholder="username">
        <input id="emailInput"
               class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
               type="email" name="email" placeholder="email">
        <input id="passwordInput"
               class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
               type="password" name="password" placeholder="password"/>
        <input id="password2Input"
               class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
               type="password" name="password2" placeholder="repeat password"/>
        <button class="br-none bg-accent-hover color-bg-hover mt-3 mb-3
            m-1 font-head color f-500 f-s bg-secondary p-1 pr-5 pl-5 c-pointer" type="submit">Log In
        </button>
        <a class="m-1 font-other color-secondary decoration-none color-hover color-bg-hover" href="index.php">Have an
            account ?</a>
    </form>
</main>
</body>
</html>