"use strict";
const backButton = document.querySelector('#back');
const goBack = () => {
    window.location.href = '/flashcard/panel.php';
};
backButton === null || backButton === void 0 ? void 0 : backButton.addEventListener('click', goBack);
