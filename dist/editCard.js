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
const editMain = document.querySelector('main');
const editForm = document.querySelector('#cardForm');
const edit = (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const data = new FormData(editForm);
    data.append('id', editMain === null || editMain === void 0 ? void 0 : editMain.id);
    yield fetch('http://localhost:8080/flashcard/api/handleUpdateCard.php', { method: "POST", body: data })
        .then(res => res.json())
        .then(data => {
        if (!data.status)
            alert('error');
        window.location.href = '/flashcard/cards.php';
    });
});
editForm === null || editForm === void 0 ? void 0 : editForm.addEventListener('submit', (e) => edit(e));
