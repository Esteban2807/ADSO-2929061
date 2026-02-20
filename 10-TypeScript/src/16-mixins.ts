// Mixin to add jump ability
class Character16 {
    name = "Hornet";
}

class Jumper {
    jump() {
        return "jumped!";
    }
}

function applyMixins(derivedCtor: any, baseCtors: any[]) {
    baseCtors.forEach(baseCtor => {
        Object.getOwnPropertyNames(baseCtor.prototype).forEach(name => {
            derivedCtor.prototype[name] = baseCtor.prototype[name];
        });
    });
}

class JumpingCharacter16 extends Character16 {}
applyMixins(JumpingCharacter16, [Jumper]);

const hero = new JumpingCharacter16();
const output16 = document.getElementById('output16');
if (output16) {
    output16.innerHTML = `
        <li><strong>Character:</strong> ${hero.name}</li>
        <li><strong>Action:</strong> ${(hero as any).jump()}</li>
    `;
}