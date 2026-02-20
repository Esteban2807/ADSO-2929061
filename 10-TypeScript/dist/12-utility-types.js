"use strict";
const update = { health: 80 };
const output12 = document.getElementById('output12');
if (output12) {
    output12.innerHTML = `
        <li><strong>Updated Property: </strong> Health</li>
        <li><strong>New Value: </strong> ${update.health}</li>

    `;
}
