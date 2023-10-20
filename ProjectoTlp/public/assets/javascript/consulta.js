function validarFormulario() {
  let pnome = document.getElementById('pnome').value;
  let unome = document.getElementById('unome').value;
  let email = document.getElementById('email').value;
  let tel = document.getElementById('number').value;
  let city = document.getElementById('city').value;
  let idade = document.getElementById('idade').value;
  let bi = document.getElementById('bi').value;
  let hora = document.getElementById('hora').value;
  let gender = document.querySelector('input[name="gender"]:checked');
  let tipoConsulta = document.getElementById("tipo_consulta").value;

  if (pnome === '') {
      alert('Por favor, informe o primeiro nome.');
      return false;
  }

  if (unome === '') {
      alert('Por favor, informe o sobrenome.');
      return false;
  }

  if (email === '') {
      alert('Por favor, informe o email.');
      return false;
  }

  if (tel === '') {
      alert('Por favor, informe o telefone.');
      return false;
  }

  if (city === '') {
      alert('Por favor, informe a cidade ou bairro.');
      return false;
  }

  if (idade === '') {
      alert('Por favor, informe a data de nascimento.');
      return false;
  }

  if (bi === '') {
      alert('Por favor, informe o número do BI.');
      return false;
  }

  if (hora === '') {
      alert('Por favor, informe o horário.');
      return false;
  }

  if (tipoConsulta === "") {
      alert("Por favor, selecione o tipo de consulta.");
      return false;
  }

  if (gender === null) {
      alert('Por favor, informe o seu gênero.');
      return false;
  }

  if (confirm('Deseja realmente marcar a consulta?')) {
      return true;
  } else {
      return false;
  }

  // Exemplo de redirecionamento para uma página após marcar a consulta
  return true;
}

