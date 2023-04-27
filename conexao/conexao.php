<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "revistaq_csgo";
$password = "3526viniWar";
$dbname = "revistaq_csgo";

// Cria a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if (!$conn) {
  die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
