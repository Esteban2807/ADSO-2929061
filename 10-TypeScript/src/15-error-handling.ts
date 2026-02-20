// Error handling with try/catch
function attack15(damage: number): string {
    if (damage < 0) {
        throw new Error("Damage cannot be negative");
    }
    return `Attack dealt ${damage} damage`;
}

try {
    const result = attack15(20);
    const output15 = document.getElementById('output15');
    if (output15) {
        output15.innerHTML = `<li><strong>✓</strong> ${result}</li>`;
    }
} catch (error) {
    const output15 = document.getElementById('output');
    if (output15) {
        output15.innerHTML = `<li><strong>✗ Error:</strong> ${error}</li>`;
    }
}