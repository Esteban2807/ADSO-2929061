//Simple module example
export const maxHealth = 100
export function heal(amount: number): number{
    return amount;
}
const healed = heal(25);
const output09 = document.getElementById('output09');

if(output09){
    output09.innerHTML = `
        <li><strong>Max Health: </strong> ${maxHealth}</li>
        <li><strong>Healed: </strong> ${healed}</li>

    `
}