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
const cards = [];
let card_id = 0;
let isFlipped = false;
const leftBtn = document.querySelector('#left');
const rightBtn = document.querySelector('#right');
const cardText = document.querySelector('#cardText');
const card = document.querySelector('#card');
const flip = () => {
    isFlipped = !isFlipped;
    handleChangeId();
};
const handleChangeId = () => {
    if (cardText) {
        isFlipped ? cardText.innerText =
            cards[card_id].second_side : cardText.innerText = cards[card_id].one_side;
    }
};
leftBtn === null || leftBtn === void 0 ? void 0 : leftBtn.addEventListener('click', () => {
    if (card_id > 0)
        card_id--;
    isFlipped = false;
    handleChangeId();
});
rightBtn === null || rightBtn === void 0 ? void 0 : rightBtn.addEventListener('click', () => {
    if (card_id < cards.length - 1)
        card_id++;
    isFlipped = false;
    handleChangeId();
});
card === null || card === void 0 ? void 0 : card.addEventListener('click', () => flip());
const getData = () => __awaiter(void 0, void 0, void 0, function* () {
    yield fetch('http://localhost:8080/flashcard/api/handleGetCards.php')
        .then(res => res.json())
        .then(data => {
        if (!data.status) {
            window.location.href = '/flashcard/cards/deck.php';
        }
        else {
            const res = data.result;
            res.forEach(item => cards.unshift(item));
            handleChangeId();
        }
    });
});
getData();
