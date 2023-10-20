<?php
session_start();

// Verifica se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos foram preenchidos
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $senha = $_POST['password'];

        // Realize a validação do usuário no banco de dados
        // Substitua as credenciais de conexão do banco de dados pelas suas
        $dsn = 'mysql:host=localhost;dbname=hospital1';
        $username = 'root';
        $password_db = 'P@ssw0rd';

        try {
            $db = new PDO($dsn, $username, $password_db);

            // Consulta para verificar o usuário com o email e a senha fornecidos
            $query = "SELECT id, email FROM cadastro WHERE email = :email AND senha = :senha";
            $statement = $db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':senha', $senha);
            $statement->execute();

            // Verifica se o usuário foi encontrado
            if ($statement->rowCount() > 0) {
                // Recupera os dados do usuário
                $user = $statement->fetch(PDO::FETCH_ASSOC);

                // Define a sessão do usuário
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                // Redireciona para a página inicial
                header('Location: ../home/index.php');
                exit();
            } else {
                // Exibe mensagem de erro
                $error = "Credenciais inválidas. Tente novamente.";
            }
        } catch (PDOException $e) {
            // Trate erros de conexão com o banco de dados
            $error = "Erro no banco de dados: " . $e->getMessage();
        }
    } else {
        // Exibe mensagem de erro se os campos não estiverem preenchidos
        $error = "Preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/assets/css/login.css">
</head>
<body>
    <div class="login">
        <a href="../home/index.html"><img src="../../public/imagens/chevron-back-outline.svg" alt=""></a> 
        <form action="login.php" id="formulario" onsubmit="return validarFormulario()" method="POST">
            <header>Fazer Login</header>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <input type="email" placeholder="exemplo@gmail.com" title="Digite seu email" id="email" name="email" required>
            <input type="password" placeholder="Digite sua senha" title="Digite sua senha" id="password" name="password" required>
            <input type="submit" value="login">
        </form>
        <p id="cadastro-info" style="display: none;">Ainda não possui um cadastro? <a href="../cadastro/index.html">Clique aqui</a> para se cadastrar.</p>
    </div>
    <script src="../../public/assets/javascript/login.js"></script>
</body>
</html>
