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
        }
    });
});
getData();
console.log(cards);
