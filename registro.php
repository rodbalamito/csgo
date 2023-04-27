<!DOCTYPE html>
<html>
<head>
  <title>Registro de Usuário</title>
</head>
<body>
  <h1>Registro de Usuário</h1>
  <form method="post" action="conexao/cadastro.php">
    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>
    <label>Sobrenome:</label>
    <input type="text" name="sobrenome" required><br><br>
    <label>E-mail:</label>
    <input type="email" name="email" required><br><br>
    <label>Senha:</label>
    <input type="password" name="senha" required><br><br>
    <label>Time:</label>
    <select name="time" required>
      <option value="">Selecione um time</option>
      <option value="A">Time A</option>
      <option value="B">Time B</option>
    </select><br><br>
    <input type="submit" name="cadastrar" value="Cadastrar">
  </form>
</body>
</html>