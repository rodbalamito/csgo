<?php
// Inclui o arquivo de conexão com o banco de dados
include_once "conexao.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastrar"])) {
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $time = $_POST["time"];

  // Verifica se o e-mail já está cadastrado
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "Esse e-mail já está cadastrado.";
  } else {
    // Insere os dados do usuário no banco de dados
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, time) VALUES ('$nome', '$sobrenome', '$email', '$senha', '$time')";
    if (mysqli_query($conn, $sql)) {
      echo "Usuário cadastrado com sucesso.";
    } else {
      echo "Erro ao cadastrar o usuário: " . mysqli_error($conn);
    }
  }
}
?>
