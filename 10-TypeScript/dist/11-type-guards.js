"use strict";
function isPlayer(entity) {
    return entity.name != undefined;
}
const entity = { name: "Hornet" };
const result11 = isPlayer(entity) ? "Player detected" : "Enemy detected";
const output11 = document.getElementById('output11');
if (output11) {
    output11.innerHTML = `
        <li><strong>Entity Type: </strong> ${result11}</li>

    `;
}
