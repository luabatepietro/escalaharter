<?php
session_start(); // Inicializa a sessão PHP no início do script

// Inclui o arquivo de conexão com o banco de dados
$mysqli = require __DIR__ . "/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o usuário está logado e temos seu ID
    if (isset($_SESSION["usuarios_id"])) {
        $usuarioId = $_SESSION["usuarios_id"];
        $pontuacaoTotal = 0;

        // Processa cada resposta com prefixo 'question'
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'question') === 0) {
                // Calcula a pontuação com base na resposta
                switch ($value) {
                    case 'realmente-assim':
                        $pontuacaoTotal += 4;
                        break;
                    case 'um-pouco-assim':
                        $pontuacaoTotal += 3;
                        break;
                    case 'nao-muito-assim':
                        $pontuacaoTotal += 2;
                        break;
                    case 'nao-assim':
                        $pontuacaoTotal += 1;
                        break;
                }
            }
        }

        // Prepara e executa a atualização da pontuação no banco de dados
        $sql = "UPDATE usuarios SET pontuacao_total = pontuacao_total + ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ii", $pontuacaoTotal, $usuarioId);

            if ($stmt->execute()) {
                echo "<script>alert('Pontuação atualizada com sucesso!'); window.location.href='pagina_de_confirmacao.php';</script>";
                header("Location: index.php");
            } else {
                die("Erro ao atualizar a pontuação: " . $stmt->error);
            }
        } else {
            die("Erro ao preparar a atualização da pontuação: " . $mysqli->error);
        }
    } else {
        header("Location: index.php");
        exit;
    }
}
?>
