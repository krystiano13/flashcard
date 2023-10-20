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
const cardForm = document.querySelector("#cardForm");
const cardMain = document.querySelector('main');
const cardErrorsDiv = document.querySelector('.errors');
const cardErrors = [];
const create = (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append('id', cardMain === null || cardMain === void 0 ? void 0 : cardMain.id);
    yield fetch('http://localhost:8080/flashcard/api/handleCreateCard.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
        if (data.status) {
            window.location.href = "/flashcard/cards.php";
        }
        else {
            alert('Error');
        }
    });
});
cardForm === null || cardForm === void 0 ? void 0 : cardForm.addEventListener('submit', e => create(e));
