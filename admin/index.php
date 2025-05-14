<?php
session_start();

// Redireciona automaticamente para o painel, caso logado
if (isset($_SESSION['admin'])) {
  header('Location: dashboard.php');
  exit;
}

// Caso não esteja logado, redireciona para a tela de login
header('Location: login.php');
exit;
