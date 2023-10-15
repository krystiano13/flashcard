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
const deckForm = document.querySelector('#form');
const deckNameInput = document.querySelector('#deckInput');
deckForm === null || deckForm === void 0 ? void 0 : deckForm.addEventListener('submit', (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const data = new FormData();
    data.append('deckName', deckNameInput === null || deckNameInput === void 0 ? void 0 : deckNameInput.value);
    yield fetch('http://localhost/flashcard/api/handleCreateDeck.php', {
        method: "POST",
        body: data
    })
        .then(res => res.json())
        .then(data => {
        if (data.status) {
            window.location.href = '/flashcard/panel.php';
        }
        else {
            alert('Error while creating a deck');
        }
    });
}));
