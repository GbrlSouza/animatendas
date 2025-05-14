<?php
session_start();
session_unset(); // limpa todas as variáveis da sessão
session_destroy(); // destrói a sessão

// Redireciona para a página de login
header('Location: login.php');
exit;
