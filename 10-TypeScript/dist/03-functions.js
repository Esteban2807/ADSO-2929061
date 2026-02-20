"use strict";
function calculateAttack(baseDamage, multipler) {
    return baseDamage * multipler;
}
const attack = calculateAttack(15, 3);
const output03 = document.getElementById('output03');
if (output03) {
    output03.innerHTML = `
        <li><b>Base Damage: </b> 15 </li>
        <li><b>Multipler:</b> 3 </li>
        <li><b>Total Attack:</b>${attack}</li<>
    `;
}
