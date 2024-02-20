<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="cadastro">
        <h1> Cadastro </h1>
        <form action="cadastro.php" method="POST" id="cadastro" novalidate>
            Nome: <input type="text" name="nome" id="nome"> <br>
            Email: <input type="email" name="email" id="email"> <br>
            Senha: <input type="password" name="senha" id="senha"> <br>
            <input type="submit" value="Cadastrar">
       </form>
    </div>
</body>
</html>