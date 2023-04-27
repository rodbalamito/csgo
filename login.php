<?php
// Inclui o arquivo de conexão com o banco de dados
require_once('conexao/conexao.php');

// Inicia a sessão
session_start();

// Verifica se o usuário já está logado
if(isset($_SESSION['email'])){
  // Redireciona para a página principal
  header("Location: index.php");
  exit;
}

// Verifica se o formulário foi enviado
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  // Obtém o email e senha do formulário
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Prepara a consulta SQL para verificar se o usuário existe
  $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

  // Executa a consulta SQL
  $result = mysqli_query($conn, $sql);

  // Verifica se o usuário foi encontrado
  if(mysqli_num_rows($result) > 0){
    // Inicia a sessão e salva o email na variável de sessão
    $_SESSION['email'] = $email;

    // Redireciona para a página principal
    header("Location: index.php");
    exit;
  } else {
    // exibe uma mensagem de erro caso o usuário não tenha sido encontrado
    $mensagem = "Email ou senha incorretos.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>

  <?php if(isset($mensagem)): ?>
    <p><?php echo $mensagem; ?></p>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <br><br>

    <input type="submit" value="Entrar">
  </form>
</body>
</html>
