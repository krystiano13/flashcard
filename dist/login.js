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
const form = document.querySelector('form');
const usernameInput = document.querySelector('#usernameInput');
const passwordInput = document.querySelector('#passwordInput');
const errorsDiv = document.querySelector('.errors');
const injectErrors = (errors) => {
    errorsDiv.innerHTML = "";
    errors.forEach((item) => {
        const paragraph = document.createElement('p');
        paragraph.innerText = item;
        paragraph.className = "f-xs font-head color-bg mt-1";
        errorsDiv === null || errorsDiv === void 0 ? void 0 : errorsDiv.appendChild(paragraph);
    });
};
const handleSubmit = (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const formData = new FormData();
    formData.append('username', usernameInput === null || usernameInput === void 0 ? void 0 : usernameInput.value);
    formData.append('password', passwordInput === null || passwordInput === void 0 ? void 0 : passwordInput.value);
    yield fetch('http://localhost/flashcard/api/handleLogin.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
        if (!data.status) {
            if (data.errors)
                injectErrors(data.errors);
        }
        else {
            window.location.href = '/flashcard/panel.php';
        }
    });
});
form === null || form === void 0 ? void 0 : form.addEventListener('submit', (e) => handleSubmit(e));
