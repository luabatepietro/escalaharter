<?php

if (empty($_POST['nome'])) {
    die("Nome não informado");
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Email inválido");
}

if (strlen($_POST['senha']) < 8) {
    die("Senha muito curta");
}

if (!preg_match('/[a-z]/i', $_POST['senha'])) {
    die("Senha deve conter pelo menos uma letra");
}

if (!preg_match('/[0-9]/', $_POST['senha'])) {
    die("Senha deve conter pelo menos um número");
}

$mysqli = require __DIR__ . '/database.php';

$emailCheckSql = "SELECT email FROM usuarios WHERE email = ?";
$stmt = $mysqli->stmt_init();
if (!$stmt->prepare($emailCheckSql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param('s', $_POST['email']);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    die("Email já cadastrado");
}

$password_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = 'INSERT INTO usuarios (nome, email, senha_hash) VALUES (?, ?, ?)';
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param('sss', $_POST['nome'], $_POST['email'], $password_hash);

if ($stmt->execute()) {

    header("Location: cadastro-feito.html");
    exit;

} else {
    die("Erro ao cadastrar usuário: " . $mysqli->error);
}

?>
