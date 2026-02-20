"use strict";
class Inventory {
    constructor() {
        this.items = [];
    }
    addItem(item) {
        this.items.push(item);
    }
    getItems() {
        return this.items;
    }
}
const charmInventory = new Inventory();
charmInventory.addItem('Mothwing Cloak');
charmInventory.addItem('Crystal Hearth');
const output05 = document.getElementById('output05');
if (output05) {
    output05.innerHTML = ` 
    <li><b>Charms Collected:</b></li>
    <ul>${charmInventory.getItems().map(c => `<li>${c}</li>`).join('')}</ul>
    `;
}
