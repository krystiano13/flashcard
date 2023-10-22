"use strict";
const backButton = document.querySelector('#back');
const addButton = document.querySelector('#add');
const startButton = document.querySelector('#start');
const goBack = () => {
    window.location.href = '/flashcard/panel.php';
};
const goCardsView = () => {
    window.location.href = '/flashcard/cards.php';
};
const start = () => {
    window.location.href = '/flashcard/learn.php';
};
backButton === null || backButton === void 0 ? void 0 : backButton.addEventListener('click', goBack);
addButton === null || addButton === void 0 ? void 0 : addButton.addEventListener('click', goCardsView);
startButton === null || startButton === void 0 ? void 0 : startButton.addEventListener('click', start);
