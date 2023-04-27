<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
   // Redireciona para a página de login
   header('Location: login.php');
   exit();
}

// Obtém o ID do usuário logado
$id_usuario_logado = $_SESSION['id'];

// Conexão com o banco de dados
$conn = mysqli_connect('localhost', 'usuario', 'senha', 'nome_do_banco');

// Verifica se a conexão foi bem sucedida
if (!$conn) {
    die('Erro de conexão: ' . mysqli_connect_error());
}

// Consulta SQL para obter os usuários do mesmo time que o usuário logado
$sql = "SELECT * FROM usuarios WHERE time = (SELECT time FROM usuarios WHERE id = $id_usuario_logado)";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuários do mesmo time</title>
</head>
<body>

<h1>Usuários do mesmo time</h1>

<?php
// Exibe as informações dos usuários na página HTML
while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<div>';
    echo '<img src="' . $row['foto'] . '" alt="' . $row['nome'] . ' ' . $row['sobrenome'] . '">';
    echo '<p>' . $row['nome'] . ' ' . $row['sobrenome'] . '</p>';
    echo '<p>' . $row['email'] . '</p>';
    echo '</div>';
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
