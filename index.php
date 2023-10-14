<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: /flashcard/index.php');
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
    <link rel="stylesheet" href="./styles/login.css?v=11"/>
    <script defer src="dist/login.js"></script>
</head>
<body>
<main class="width-100 height-100 d-flex flex-col jc-center ai-center bg">
    <form id="form" method="post" class="d-flex flex-col ai-center jc-center bg-primary p-4 pt-6 pb-6 br-rad-1">
        <input id="usernameInput"
               class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
               type="text" name="username" placeholder="username">
        <input id="passwordInput"
               class="m-1 mt-3 mb-3 font-other p-1 outline-none br-none br-b-solid br-b-2 br-b-accent bg-secondary color f-s"
               type="password" name="password" placeholder="password"/>
        <button class="br-none bg-accent-hover color-bg-hover mt-3 mb-3
            m-1 font-head color f-500 f-s bg-secondary p-1 pr-5 pl-5 c-pointer" type="submit">Log In
        </button>
        <a class="m-1 font-other color-secondary decoration-none color-hover color-bg-hover" href="register.php">Haven't
            got an account ?</a>
        <div class="errors"></div>
    </form>
</main>
</body>
</html>
