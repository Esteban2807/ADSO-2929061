// Simple class decorator

function PowerUp(constructor: Function) {
    constructor.prototype.powered = true;
}
@PowerUp
class Character {
    name: string = "Hornet";
}
const hornet = new Character();









const output08 = document.getElementById('output08');

if(output08){
    output08.innerHTML = `
        <li><strong>Character: </strong> ${hornet.name}</li>
        <li><strong>Powered Up: </strong> ${(hornet as any).powered}</li>

    `
}