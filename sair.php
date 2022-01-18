<?php
// Inicia a sessão
session_start();

// Encerra a sessão
session_destroy();

// Redireciona
header("location:login.php");
?>