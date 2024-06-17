document.getElementById("telefono").addEventListener("input", function(event) {
    let valore = event.target.value;
    event.target.value = valore.replace(/\D/g, '');
});