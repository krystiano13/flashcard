const backButton: HTMLButtonElement | null = document.querySelector('#back');
const addButton: HTMLButtonElement | null = document.querySelector('#add');
const startButton: HTMLButtonElement | null = document.querySelector('#start');

const goBack = () => {
    window.location.href = '/flashcard/panel.php';
}

const goCardsView = () => {
    window.location.href = '/flashcard/cards.php';
}

const start = () => {
    window.location.href = '/flashcard/learn.php';
}

backButton?.addEventListener('click', goBack);
addButton?.addEventListener('click', goCardsView);
startButton?.addEventListener('click', start);