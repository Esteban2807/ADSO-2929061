// Promise to fetch enemy data
function fetchEnemy(): Promise<string> {
    return new Promise((resolve) => {
        setTimeout(() => resolve("Lace"), 800);
    });
}

fetchEnemy().then((enemy) => {
    const output14 = document.getElementById('output14');
    if (output14) {
        output14.innerHTML = `<li><strong>Enemy Found:</strong> ${enemy}</li>`;
    }
});