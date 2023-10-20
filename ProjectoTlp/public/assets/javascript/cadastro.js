function validarFormulario() {
    let nome = document.getElementById('nome').value;
    let email = document.getElementById('email').value;
    let senha = document.getElementById('senha').value;
    let idade = document.getElementById('idade').value
  
    if (nome === '') {
      alert('Por favor, informe o nome.');
      return false;
    }
  
    if (email === '') {
      alert('Por favor, informe o email.');
      return false;
    }
    if (idade === '') {
        alert('Por favor, informe a sua idade.');
        return false;
      }
    if (senha === '') {
      alert('Por favor, informe a senha.');
      return false;
    }
  
    return true;
  }
  