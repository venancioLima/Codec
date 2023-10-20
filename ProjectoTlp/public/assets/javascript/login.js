function validarFormulario() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email === "" || password === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
    }

    // Outras validações podem ser adicionadas aqui

    return true;
}
