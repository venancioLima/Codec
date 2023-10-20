<?php
session_start();

// Verificar se o usuário está logado
if (isset($_SESSION['user_id'])) {
    // Realize qualquer processamento necessário para fazer logout

    // Remova as variáveis de sessão
    session_unset();

    // Destrua a sessão
    session_destroy();
}

// Redirecionar o usuário para a mesma página
header('Location: index.php');
exit();
?>
