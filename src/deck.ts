const backButton: HTMLButtonElement | null = document.querySelector('#back');

const goBack = () => {
    window.location.href = '/flashcard/panel.php';
}

backButton?.addEventListener('click', goBack);