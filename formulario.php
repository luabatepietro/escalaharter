<?php
session_start();

$mysqli = require __DIR__ . "/database.php";


if (isset($_SESSION["usuarios_id"])) {
    $sql = "SELECT * FROM usuarios WHERE id = {$_SESSION["usuarios_id"]}";
    $result = $mysqli->query($sql);
    $usuario = $result->fetch_assoc();
}

define('RESPOSTA', '
    <tr>
        <td>
            <label><input type="radio" name="question[NUM]" value="realmente-assim">Eu sou realmente assim</label><br>
            <label><input type="radio" name="question[NUM]" value="um-pouco-assim">Eu sou um pouco assim</label>
        </td>
        <td></td>
        <td>
            <label><input type="radio" name="question[NUM]" value="nao-muito-assim">Eu sou realmente assim</label><br>
            <label><input type="radio" name="question[NUM]" value="nao-assim">Eu sou um pouco assim</label>
        </td>
    </tr>'
);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">
    <title>Formulario</title>
</head>
<body>

    <header>
        <div class="top-bar">
            <h1>Auto-Percepção com Escala Harter</h1>
            <div class="user-info">
                <?php if (isset($usuario)): ?>
                <p class="welcome-message">Bem vindo, <span><?= htmlspecialchars($usuario["nome"]) ?></span></p>

                <p class="welcome-message"><a href="logout.php">Sair</a></p>

                <?php else: ?>

                    <p class="welcome-message"><a href="index.html">Entrar</a> ou <a href="cadastrar.php">Cadastre-se</a></p>
                
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div class="questionario">
        <form id="questionnaire-form" action='pontuacao.php' method="post">
            <div class="progress-bar-container">
                <div class="progress-bar" id="progress-bar"></div>
            </div>
            <!-- Page 1 -->
            <div class="form-page" id="page1">

            <!-- Question 1 -->
            <table>
            <tr>
                <td>Alguns adolescentes gostam de ir ao cinema em seu tempo livre,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não gostam de ir ao cinema em seu tempo livre.</td>
            </tr>
            <?php echo str_replace('[NUM]', '1', RESPOSTA); ?>
            </table>

            <!-- Question 2 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que são tão inteligentes quanto outros de sua idade,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não têm tanta certeza de que sejam tão inteligentes quanto outros de sua idade.</td>
            </tr>
            <?php echo str_replace('[NUM]', '2', RESPOSTA); ?>
            </table>

            <!-- Question 3 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que é difícil fazer novos amigos,</td>
                <td class="mas">MAS</td>
                <td>para outros é muito fácil fazer novos amigos.</td>
            </tr>
            <?php echo str_replace('[NUM]', '3', RESPOSTA); ?>
            </table>

            <!-- Question 4 -->
            <table>
            <tr>
                <td>Alguns adolescentes têm um bom desempenho em todos os tipos de esporte,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acreditam que não sejam bons nos esportes.</td>
            </tr>
            <?php echo str_replace('[NUM]', '4', RESPOSTA); ?>
            </table>
            
            <!-- Question 5 -->
            <table>
            <tr>
                <td>Alguns adolescentes não estão contentes com sua aparência física,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes estão contentes com sua aparência física.</td>
            </tr>
            <?php echo str_replace('[NUM]', '5', RESPOSTA); ?>
            </table>

            <!-- Question 6 -->
            <table>
            <tr>
                <td>Alguns adolescentes pensam estar prontos para trabalhar e estudar concomitantemente, </td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acham que  ainda não estão prontos para trabalhar e estudar concomitantemente</td>
            </tr>
            <?php echo str_replace('[NUM]', '6', RESPOSTA); ?>
            </table>

            <!-- Question 7 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que se estiverem  a fim de alguém, serão correspondidos,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes preocupam-se porque pensam que se estiverem a fim de alguém, não serão correspondidos.</td>
            </tr>
            <?php echo str_replace('[NUM]', '7', RESPOSTA); ?>
            </table>

            <!-- Question 8 -->
            <table>
            <tr>
                <td>Alguns adolescentes geralmente fazem o que é correto,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não fazem o que é correto. </td>
            </tr>
            <?php echo str_replace('[NUM]', '8', RESPOSTA); ?>
            </table>

            <!-- Question 9 -->
            <table>
            <tr>
                <td>Alguns adolescentes conseguem fazer amigos(as) íntimos(as),</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acham difícil fazer amigos(as) íntimos(as).</td>
            </tr>
            <?php echo str_replace('[NUM]', '9', RESPOSTA); ?>
            </table>

            <!-- Question 10 -->
            <table>
            <tr>
                <td>Alguns adolescentes geralmente não estão satisfeitos consigo,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes estão satisfeitos consigo.</td>
            </tr>
            <?php echo str_replace('[NUM]', '10', RESPOSTA); ?>
            </table>






            </div>
            <!-- Page 2 -->
            <div class="form-page" id="page2">

            <!-- Question 11 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham difícil concluir suas tarefas escolares,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes concluem suas tarefas mais rapidamente.</td>
            </tr>
            <?php echo str_replace('[NUM]', '11', RESPOSTA); ?>
            </table>

            <!-- Question 12 -->
            <table>
            <tr>
                <td>Alguns adolescentes têm muitos amigos,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não têm tantos amigos.</td>
            </tr>
            <?php echo str_replace('[NUM]', '12', RESPOSTA); ?>
            </table>

            <!-- Question 13 -->
            <table>
            <tr>
                <td>Alguns adolescentes pensam que se dariam bem  em qualquer esporte novo,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não acreditam que se dariam bem em qualquer esporte novo.</td>
            </tr>
            <?php echo str_replace('[NUM]', '13', RESPOSTA); ?>
            </table>

            <!-- Question 14 -->
            <table>
            <tr>
                <td>Alguns adolescentes gostariam que seu corpo fosse diferente,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes gostam de seu corpo como ele é.</td>
            </tr>
            <?php echo str_replace('[NUM]', '14', RESPOSTA); ?>
            </table>

            <!-- Question 15 -->
            <table>
            <tr>
                <td>Alguns adolescentes acreditam não possuir habilidades suficientes para se sair bem em um emprego,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acreditam possuir habilidades suficientes para se sair bem em um emprego.</td>
            </tr>
            <?php echo str_replace('[NUM]', '15', RESPOSTA); ?>
            </table>

            <!-- Question 16 -->
            <table>
            <tr>
                <td>Alguns adolescentes não estão namorando quem eles gostariam,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes estão namorando quem eles gostariam</td>
            </tr>
            <?php echo str_replace('[NUM]', '16', RESPOSTA); ?>
            </table>

            <!-- Question 17 -->
            <table>
            <tr>
                <td>Alguns adolescentes geralmente se envolvem em problemas devido às coisas que fazem,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes geralmente não fazem coisas que lhes tragam problemas.</td>
            </tr>
            <?php echo str_replace('[NUM]', '17', RESPOSTA); ?>
            </table>

            <!-- Question 18 -->
            <table>
            <tr>
                <td>Alguns adolescentes têm um(a) melhor amigo(a) a quem possam contar segredos,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não têm um(a) melhor amigo(a) a quem possam contar segredos.</td>
            </tr>
            <?php echo str_replace('[NUM]', '18', RESPOSTA); ?>
            </table>

            <!-- Question 19 -->
            <table>
            <tr>
                <td>Alguns adolescentes não gostam da maneira como estão levando suas vidas,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes gostam da maneira como estão levando suas vidas.</td>
            </tr>
            <?php echo str_replace('[NUM]', '19', RESPOSTA); ?>
            </table>

            <!-- Question 20 -->
            <table>
            <tr>
                <td>Alguns adolescentes trabalham muito bem em aula,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não trabalham muito bem em aula.</td>
            </tr>
            <?php echo str_replace('[NUM]', '20', RESPOSTA); ?>
            </table>



            </div>
            <!-- Page 3 -->
            <div class="form-page" id="page3">
            <!-- Questions 21-30 -->

                
            <!-- Question 21 -->
            <table>
            <tr>
                <td>Alguns adolescentes não inspiram simpatia,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes  inspiram simpatia.</td>
            </tr>
            <?php echo str_replace('[NUM]', '21', RESPOSTA); ?>
            </table>
                
            <!-- Question 22 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que praticam esportes melhor do que os outros de sua idade, </td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acham que não praticam tão bem esportes.</td>
            </tr>
            <?php echo str_replace('[NUM]', '22', RESPOSTA); ?>
            </table>
                
            <!-- Question 23 -->
            <table>
            <tr>
                <td>Alguns adolescentes gostariam que sua aparência fosse diferente,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes gostam da sua aparência do jeito que é.</td>
            </tr>
            <?php echo str_replace('[NUM]', '23', RESPOSTA); ?>
            </table>
                
            <!-- Question 24 -->
            <table>
            <tr>
                <td>Alguns adolescentes acreditam que são suficientemente maduros para conseguir um trabalho remunerado,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acreditam que não são suficientemente maduros para conseguir um trabalho remunerado.</td>
            </tr>
            <?php echo str_replace('[NUM]', '24', RESPOSTA); ?>
            </table>
                
            <!-- Question 25 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que existem jovens de sua idade que gostariam de “ficar” com eles,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes se preocupam se existem jovens de sua idade que queiram “ficar” com eles.</td>
            </tr>
            <?php echo str_replace('[NUM]', '25', RESPOSTA); ?>
            </table>
                
            <!-- Question 26 -->
            <table>
            <tr>
                <td>Alguns adolescentes estão satisfeitos com sua forma de agir,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não estão satisfeitos com sua forma de agir.</td>
            </tr>
            <?php echo str_replace('[NUM]', '26', RESPOSTA); ?>
            </table>
                
            <!-- Question 27 -->
            <table>
            <tr>
                <td>Alguns adolescentes gostariam de ter um(a) amigo(a) com quem pudessem contar,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes já têm um(a) amigo(a) com quem podem contar.</td>
            </tr>
            <?php echo str_replace('[NUM]', '27', RESPOSTA); ?>
            </table>
                
            <!-- Question 28 -->
            <table>
            <tr>
                <td>Alguns adolescentes estão satisfeitos consigo a maior parte do tempo,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não estão satisfeitos consigo a maior parte do tempo.</td>
            </tr>
            <?php echo str_replace('[NUM]', '28', RESPOSTA); ?>
            </table>
                
            <!-- Question 29 -->
            <table>
            <tr>
                <td>Alguns adolescentes têm dificuldades para responder corretamente às perguntas dos professores,,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes quase sempre respondem corretamente às perguntas dos professores.</td>
            </tr>
            <?php echo str_replace('[NUM]', '29', RESPOSTA); ?>
            </table>
                
            <!-- Question 30 -->
            <table>
            <tr>
                <td>Alguns adolescentes são muito conhecidos por pessoas de sua idade,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não são tão conhecidos por pessoas de sua idade.</td>
            </tr>
            <?php echo str_replace('[NUM]', '30', RESPOSTA); ?>
            </table>


            </div>
            <div class="form-page" id="page4">
            <!-- Questions 31-40 -->


            <!-- Question 31 -->
            <table>
            <tr>
                <td>Alguns adolescentes não se dão bem em esportes ao ar livre,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes se dão bem em esportes ao ar livre. </td>
            </tr>
            <?php echo str_replace('[NUM]', '31', RESPOSTA); ?>
            </table>

            <!-- Question 32 -->
            <table>
            <tr>
                <td>Alguns adolescentes se acham bonitos,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes não se acham tão bonitos.</td>
            </tr>
            <?php echo str_replace('[NUM]', '32', RESPOSTA); ?>
            </table>

            <!-- Question 33 -->
            <table>
            <tr>
                <td>Alguns adolescentes pensam que não fariam muito bem um trabalho remunerado,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acreditam que fariam muito bem um trabalho remunerado. </td>
            </tr>
            <?php echo str_replace('[NUM]', '33', RESPOSTA); ?>
            </table>

            <!-- Question 34 -->
            <table>
            <tr>
                <td>Alguns adolescentes acreditam que são suficientemente interessantes para conquistar alguém,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes receiam não ser suficientemente interessantes para conquistar alguém.</td>
            </tr>
            <?php echo str_replace('[NUM]', '34', RESPOSTA); ?>
            </table>

            <!-- Question 35 -->
            <table>
            <tr>
                <td>Alguns adolescentes fazem coisas que sabem que não deveriam fazer,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes dificilmente fazem coisas que sabem que não deveriam fazer.</td>
            </tr>
            <?php echo str_replace('[NUM]', '35', RESPOSTA); ?>
            </table>

            <!-- Question 36 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham difícil fazer amigos nos quais possam realmente confiar,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes são capazes de fazer amigos nos quais possam realmente confiar.</td>
            </tr>
            <?php echo str_replace('[NUM]', '36', RESPOSTA); ?>
            </table>

            <!-- Question 37 -->
            <table>
            <tr>
                <td>Alguns adolescentes gostam de ser como são,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes muitas vezes gostariam de ser outra pessoa.</td>
            </tr>
            <?php echo str_replace('[NUM]', '37', RESPOSTA); ?>
            </table>

            <!-- Question 38 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que são inteligentes,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes questionam-se se são inteligentes.</td>
            </tr>
            <?php echo str_replace('[NUM]', '38', RESPOSTA); ?>
            </table>

            <!-- Question 39 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que são aceitos por pessoas de sua idade,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes desejam que mais pessoas de sua idade os aceitem.</td>
            </tr>
            <?php echo str_replace('[NUM]', '39', RESPOSTA); ?>
            </table>

            <!-- Question 40 -->
            <table>
            <tr>
                <td>Alguns adolescentes pensam não ser bons esportistas,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes pensam ser bons esportistas.</td>
            </tr>
            <?php echo str_replace('[NUM]', '40', RESPOSTA); ?>
            </table>



            </div>
            <div class="form-page" id="page5">
            <!-- Questions 41-46 -->


            <!-- Question 41 -->
            <table>
            <tr>
                <td>Alguns adolescentes realmente gostam de sua aparência física</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes gostariam de ter uma aparência física diferente.</td>
            </tr>
            <?php echo str_replace('[NUM]', '41', RESPOSTA); ?>
            </table>

            <!-- Question 42 -->
            <table>
            <tr>
                <td>Alguns adolescentes acham que são capazes de permanecer num emprego, </td>
                <td class="mas">MAS</td>
                <td>outros adolescentes acham que não são capazes de permanecer num emprego.</td>
            </tr>
            <?php echo str_replace('[NUM]', '42', RESPOSTA); ?>
            </table>

            <!-- Question 43 -->
            <table>
            <tr>
                <td>Alguns adolescentes não saem com as pessoas que gostariam de namorar,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes saem com as pessoas que eles realmente querem namorar.</td>
            </tr>
            <?php echo str_replace('[NUM]', '43', RESPOSTA); ?>
            </table>

            <!-- Question 44 -->
            <table>
            <tr>
                <td>Alguns adolescentes geralmente se comportam como o esperado,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes geralmente não se comportam como o esperado.</td>
            </tr>
            <?php echo str_replace('[NUM]', '44', RESPOSTA); ?>
            </table>

            <!-- Question 45 -->
            <table>
            <tr>
                <td>Alguns adolescentes não têm um(a) amigo(a) a quem contar seus pensamentos e sentimentos,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes têm um(a) amigo(a) quem contar seus pensamentos e sentimentos.</td>
            </tr>
            <?php echo str_replace('[NUM]', '45', RESPOSTA); ?>
            </table>

            <!-- Question 46 -->
            <table>
            <tr>
                <td>Alguns adolescentes estão felizes com seu jeito de ser,</td>
                <td class="mas">MAS</td>
                <td>outros adolescentes gostariam de ser diferentes.</td>
            </tr>
            <?php echo str_replace('[NUM]', '46', RESPOSTA); ?>
            </table>



            </div>

            <button type="button" onclick="nextPage()">Próxima Página</button>
            <button type="submit" id="submit-button" style="display: none;">Enviar</button>
        </form>

        <script src="script.js"></script>
</body>
</html>