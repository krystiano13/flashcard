"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const logoutButton = document.querySelector('#logoutBtn');
const decksDiv = document.querySelector('#decks');
const logout = () => __awaiter(void 0, void 0, void 0, function* () {
    yield fetch('http://localhost/flashcard/api/handleLogout.php', { method: "POST" })
        .then(res => res.json())
        .then(data => {
        if (data) {
            window.location.href = '/flashcard/';
        }
    });
});
const pickDeck = (e) => __awaiter(void 0, void 0, void 0, function* () {
    const el = e.target;
    if ((el === null || el === void 0 ? void 0 : el.tagName) === "P") {
        const data = new FormData();
        data.append('deck_id', el.id);
        yield fetch('http://localhost/flashcard/api/handleChooseDeck.php', { method: 'POST', body: data })
            .then(res => res.json())
            .then(data => {
            if (data.status)
                window.location.href = '/flashcard/deck.php';
        });
    }
});
decksDiv === null || decksDiv === void 0 ? void 0 : decksDiv.addEventListener('click', (e) => pickDeck(e));
logoutButton === null || logoutButton === void 0 ? void 0 : logoutButton.addEventListener('click', () => logout());
