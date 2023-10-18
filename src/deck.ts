const backButton: HTMLButtonElement | null = document.querySelector('#back');
const addButton: HTMLButtonElement | null = document.querySelector('#add');

const goBack = () => {
    window.location.href = '/flashcard/panel.php';
}

const goCardsView = () => {
    window.location.href = '/flashcard/cards.php';
}

backButton?.addEventListener('click', goBack);
addButton?.addEventListener('click', goCardsView);