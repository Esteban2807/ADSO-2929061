"use strict";
class Enemy {
    constructor(name, health) {
        this.name = name;
        this.health = health;
    }
    takeDamage(damage) {
        this.health -= damage;
        return this.health;
    }
}
const iguana = new Enemy("Iguana", 100);
const output04 = document.getElementById('output04');
if (output04) {
    output04.innerHTML = `
    <li><b>Nombre: </b> ${iguana.name} </li>
    <li><b>Salud: </b> ${iguana.health} </li>
    <li><b> Daño hecho: </b>  70 </li>
    <li><b> Salud actual: </b> ${iguana.takeDamage(70)} </li>
 `;
}
