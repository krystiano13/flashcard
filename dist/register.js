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
const registerForm = document.querySelector('#form');
const regErrorsDiv = document.querySelector('.errors');
const injectRegErrors = (errors) => {
    regErrorsDiv.innerHTML = "";
    errors.forEach((item) => {
        const paragraph = document.createElement('p');
        paragraph.innerText = item;
        paragraph.className = "f-xs font-head color-bg mt-1";
        regErrorsDiv === null || regErrorsDiv === void 0 ? void 0 : regErrorsDiv.appendChild(paragraph);
    });
};
const handleRegister = (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const formData = new FormData(registerForm);
    yield fetch('http://localhost/flashcard/api/handleRegister.php', { method: "POST", body: formData })
        .then(res => res.json())
        .then(data => {
        if (!data.status) {
            if (data.errors)
                injectRegErrors(data.errors);
        }
        else {
            alert("Register went successfully");
            window.location.href = "/flashcard/";
        }
    });
});
registerForm === null || registerForm === void 0 ? void 0 : registerForm.addEventListener('submit', (e) => handleRegister(e));
