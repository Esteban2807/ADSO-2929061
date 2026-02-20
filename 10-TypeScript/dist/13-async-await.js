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
// Async function to load data
function loadGameData() {
    return __awaiter(this, void 0, void 0, function* () {
        return new Promise((resolve) => {
            setTimeout(() => resolve("Silksong data loaded!"), 1000);
        });
    });
}
function init() {
    return __awaiter(this, void 0, void 0, function* () {
        const data = yield loadGameData();
        const output13 = document.getElementById('output13');
        if (output13) {
            output13.innerHTML = `
        <li><strong>Status: </strong> ${data}</li>

    `;
        }
    });
}
init();
