// Async function to load data
async function loadGameData(): Promise<string> {
    return new Promise((resolve) => {
        setTimeout(() => resolve("Silksong data loaded!"), 1000);
    });
}

async function init() {
    const data = await loadGameData();
   const output13 = document.getElementById('output13');
    if(output13){
    output13.innerHTML = `
        <li><strong>Status: </strong> ${data}</li>

    `
}
}

init();



