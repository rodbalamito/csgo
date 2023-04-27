<?php
// Inclui o arquivo de conexão com o banco de dados
require_once('conexao/conexao.php');

// Obtém o email do usuário logado na sessão
$email = $_SESSION['email'];

// Prepara a consulta SQL para obter o time do usuário logado
$sql = "SELECT time FROM usuarios WHERE email = '$email'";

// Executa a consulta SQL
$result = mysqli_query($conn, $sql);

// Obtém o time do usuário logado
$linha = mysqli_fetch_assoc($result);
$time = $linha['time'];

// Prepara a consulta SQL para obter os usuários do mesmo time
$sql = "SELECT * FROM usuarios WHERE time = '$time'";

// Executa a consulta SQL
$result = mysqli_query($conn, $sql);

// Exibe a tabela de usuários
echo '<table>';
echo '<tr><th>ID</th><th>Nome</th><th>Foto</th><th>Sobrenome</th><th>Email</th><th>Time</th></tr>';
while($linha = mysqli_fetch_assoc($result)){
    echo '<tr>';
    echo '<td>' . $linha['id'] . '</td>';
    echo '<td>' . $linha['nome'] . '</td>';
    echo '<td><img src="' . $linha['foto'] . '"></td>';
    echo '<td>' . $linha['sobrenome'] . '</td>';
    echo '<td>' . $linha['email'] . '</td>';
    echo '<td>' . $linha['time'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
No arquivo onde deseja exibir a tabela, basta incluir o arquivo tabela_usuarios.php:
php
Copy code
<!DOCTYPE html>
<html>
<head>
  <title>Minha Página</title>
</head>
<body>
  <h1>Minha Página</h1>

  <div>
    <!-- Inclui a tabela de usuários -->
    <?php include('tabela_usuarios.php'); ?>
  </div>

  <p>Outro conteúdo da página aqui.</p>
</body>
</html>
Dessa forma, você pode incluir a tabela de usuários do mesmo time em qualquer área do seu site, apenas usando a função include.






