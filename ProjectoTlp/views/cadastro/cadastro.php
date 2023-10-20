<?php
// Define uma variável para a mensagem de erro
$erro = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];
    $senha = $_POST["senha"];

    // Conecte-se ao banco de dados (substitua os valores pelos seus próprios)
    $servername = "localhost";
    $username = "root";
    $password = "P@ssw0rd";
    $dbname = "hospital1";

    // Crie a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Prepare a consulta SQL para verificar se os dados já existem
    $sql = "SELECT * FROM cadastro WHERE email = '$email'";

    // Execute a consulta SQL
    $result = $conn->query($sql);

    // Verifique se há algum registro com os mesmos dados
    if ($result->num_rows > 0) {
        $erro = "Os dados informados já existem. Por favor, tente novamente.";
    } else {
        // Prepara a consulta SQL para inserir os dados
        $sql = "INSERT INTO cadastro (nome, email, idade, senha) VALUES ('$nome', '$email', '$idade', '$senha')";

        // Executa a consulta SQL
        if ($conn->query($sql) === TRUE) {
            // Fecha a conexão com o banco de dados
            $conn->close();

            // Redireciona para a tela de login
            header("Location: ../login/index.html");
            exit;
        } else {
            $erro = "Erro ao cadastrar: " . $conn->error;
        }
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../../public/assets/css/cadastro.css">
    <script>
        <?php if (!empty($erro)): ?>
            alert("<?php echo $erro; ?>");
        <?php endif; ?>
    </script>
</head>
<body>
    <div class="cadastro">
       <a href="../home/index.html"><img src="../../public/imagens/chevron-back-outline.svg" alt=""></a> 
        <form method="post" action="">
            <header>Faça o seu Cadastro</header>
            <input type="text" placeholder="Digite seu nome" id="nome" name="nome">
            <input type="email" placeholder="exemplo@gmail.com" id="email" name="email">
            <input type="number" placeholder="Digite sua idade" id="idade" name="idade">
            <input type="password" placeholder="Digite sua senha" id="senha" name="senha">
            <input type="submit" value="Cadastrar" id="sub">
        </form>
    </div>
</body>
</html>
