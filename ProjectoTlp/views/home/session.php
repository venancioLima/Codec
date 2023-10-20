<?php
session_start();

// Verificar se o usuário não está logado
if (!isset($_SESSION['user_id'])) {
    // Redirecionar para a página de login
    header("Location: ../login/login.php");
    exit;
}
