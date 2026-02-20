class Inventory<T> {
    private items: T[] = [];
    addItem(item: T):void {
        this.items.push(item);
    }
    getItems(): T[] {
        return this.items;
    }
}

const charmInventory = new Inventory<string>();
charmInventory.addItem('Mothwing Cloak');
charmInventory.addItem('Crystal Hearth');

const output05 = document.getElementById('output05');

if(output05){
    output05.innerHTML = ` 
    <li><b>Charms Collected:</b></li>
    <ul>${charmInventory.getItems().map(c => `<li>${c}</li>`).join('')}</ul>
    `;
}