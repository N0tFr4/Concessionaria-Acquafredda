document.getElementById("cavalli").addEventListener("input", function(event) {
    let valore = event.target.value;
    event.target.value = valore.replace(/\D/g, '');
});

document.getElementById("cilindrata").addEventListener("input", function(event) {
    let valore = event.target.value;
    event.target.value = valore.replace(/\D/g, '');
});

document.getElementById("anno").addEventListener("input", function(event) {
    let valore = event.target.value;
    event.target.value = valore.replace(/\D/g, '');
});

document.getElementById("prezzo").addEventListener("input", function(event) {
    let valore = event.target.value;
    event.target.value = valore.replace(/\D/g, '');
});