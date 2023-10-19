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
const cardMainElement = document.querySelector('main');
const deleteCard = (e) => __awaiter(void 0, void 0, void 0, function* () {
    var _a, _b, _c;
    e.preventDefault();
    if (((_a = e.target) === null || _a === void 0 ? void 0 : _a.tagName) === "BUTTON" &&
        ((_b = e.target) === null || _b === void 0 ? void 0 : _b.innerText) === "Delete") {
        const id = (_c = e.target) === null || _c === void 0 ? void 0 : _c.id;
        const data = new FormData();
        data.append('id', id);
        yield fetch('http://localhost:8080/flashcard/api/handleDeleteCard.php', { method: "POST", body: data })
            .then(res => res.json())
            .then(data => {
            if (data.status) {
                window.location.reload();
            }
            else {
                alert('Error when deleting card');
            }
        });
    }
});
const editCard = (e) => __awaiter(void 0, void 0, void 0, function* () {
    var _d, _e, _f;
    if (((_d = e.target) === null || _d === void 0 ? void 0 : _d.tagName) === "BUTTON" &&
        ((_e = e.target) === null || _e === void 0 ? void 0 : _e.innerText) === "Edit") {
        const data = new FormData();
        data.append("card_id", (_f = e.target) === null || _f === void 0 ? void 0 : _f.id);
        yield fetch('http://localhost:8080/flashcard/api/selectCard.php', { method: "POST", body: data })
            .then(res => res.json())
            .then(data => {
            if (data.status)
                window.location.href = "/flashcard/editCard.php";
            else
                alert('Error');
        });
    }
});
cardMainElement === null || cardMainElement === void 0 ? void 0 : cardMainElement.addEventListener('click', (e) => deleteCard(e));
cardMainElement === null || cardMainElement === void 0 ? void 0 : cardMainElement.addEventListener('click', (e) => editCard(e));
