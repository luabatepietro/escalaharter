<!DOCTYPE html>
<html lang="pt-br">

<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM usuarios
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $usuario = $result->fetch_assoc();

    if($usuario) {
        
        if (password_verify($_POST["senha"], $usuario["senha_hash"])){
            
            session_start();

            session_regenerate_id();

            $_SESSION["usuarios_id"] = $usuario['id'];

            header("Location: formulario.php");
            exit;

        }
    } 

    $is_invalid = true;
}

?>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Roboto:wght@700&display=swap" rel="stylesheet">
        <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
        rel="stylesheet"
        />
        <title> Escala Harter</title>
    </head>

    <body>

        <header>
            <div class="interface">
                <nav class="menu-desktop">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Beneficios</a></li>
                        <li><a href="#">Iniciar</a></li>
                    </ul>
                </nav>

                <div class="contato">
                    <a href="#"><button>contato</button></a>
                </div>
            </div>
        </header>

        <main>

            <section class="Sobre">
                <div class="interface">
                    <div class="flex">
                        <div class="img-sobre">
                            <img src="static/undraw_Books_re_8gea.png" alt="">
                        </div>
                        <div class="txt-sobre">
                            <h2> Sobre a escala <span>harter</span> </h2>
                            <p> 
                                A Escala Harter é utilizada para avaliar a autoestima e a autopercepção. É uma ferramenta chave para o desenvolvimento pessoal, permitindo a identificação de <span>forças</span> e áreas de melhoria. Seu uso é comum em contextos terapêuticos e educacionais, apoiando o <span>crescimento</span> e o bem-estar emocional. </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="Beneficios">
                <div class="interface">
                    <h2> Benefícios </h2>
                    <div class="flex">
                        <div class="beneficios-box">
                            <div class="titulo-beneficio">
                                <h3> Melhoria da Autoavaliação </h3>
                                <div class="linha-separadora"></div>
                            </div>
                            <p> Auxilia indivíduos a terem uma melhor compreensão de suas próprias habilidades e limitações, promovendo uma autoimagem mais precisa e construtiva. </p>
                        </div>
            
                        <div class="beneficios-box">
                            <div class="titulo-beneficio">
                                <h3> Desenvolvimento Pessoal </h3>
                                <div class="linha-separadora"></div>
                            </div>
                            <p> Incentiva o crescimento pessoal ao identificar áreas que necessitam de desenvolvimento, facilitando o planejamento de objetivos pessoais e profissionais. </p>
                        </div>
            
                        <div class="beneficios-box">
                            <div class="titulo-beneficio">
                                <h3> Reconhecimento de Habilidades </h3>
                                <div class="linha-separadora"></div>
                            </div>
                            <p>  Ajuda a identificar pontos fortes que podem ser aproveitados em diferentes aspectos da vida </p>
                        </div>
            
                        <div class="beneficios-box">
                            <div class="titulo-beneficio">
                                <h3> Aumento da Autoestima </h3>
                                <div class="linha-separadora"></div>
                            </div>
                            <p> Ao entender melhor seus próprios atributos, os indivíduos tendem a desenvolver uma autoestima mais positiva. </p>
                        </div>
            
                        <div class="beneficios-box">
                            <div class="titulo-beneficio">
                                <h3> Melhoria nas Relações Interpessoais </h3>
                                <div class="linha-separadora"></div>
                            </div>
                            <p>  Com maior autoconhecimento, é possível melhorar a comunicação e o relacionamento com os outros </p>
                        </div>
            
                        <div class="beneficios-box">
                            <div class="titulo-beneficio">
                                <h3> Promoção da Saúde Mental </h3>
                                <div class="linha-separadora"></div>
                            </div>
                            <p>Contribui para a saúde mental, reduzindo ansiedade e estresse relacionados à autoimagem e expectativas. </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="faq">
                <div class="faq-content">
                    <h2>Perguntas <span>Frequentes</span></h2>
                    <div class="faq-item" id="faq1">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>Como a Escala Harter é utilizada por profissionais de saúde mental?</button>
                        <div class="panel">
                            <p>É usada para avaliar a autoestima e identificar necessidades terapêuticas.</p>
                        </div>
                    </div>
                    <div class="faq-item" id="faq2">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>Como a Escala Harter é aplicada?</button>
                        <div class="panel">
                            <p>A aplicação da Escala Harter é geralmente feita por um profissional de saúde mental qualificado. Consiste em uma série de afirmações que os respondentes avaliam em uma escala, refletindo o quanto acreditam que cada afirmação os descreve. A escala pode ser aplicada individualmente ou em grupos.</p>
                        </div>
                    </div>
                    <div class="faq-item" id="faq3">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>Qual é a importância de medir a autoestima com a Escala Harter?</button>
                        <div class="panel">
                            <p>Medir a autoestima é importante porque ela pode influenciar muitos aspectos da vida de uma pessoa, incluindo motivação, comportamento e bem-estar emocional. A Escala Harter permite uma avaliação sistemática da autoestima, que pode ser usada para identificar áreas que precisam de apoio ou intervenção.</p>
                        </div>
                    </div>
                    <div class="faq-item" id="faq4">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>É possível utilizar a Escala Harter para melhorar o desempenho acadêmico dos alunos?</button>
                        <div class="panel">
                            <p>Sim, a Escala Harter pode ser utilizada em contextos educacionais para avaliar a autoimagem dos alunos em relação à sua competência acadêmica. Ao identificar as áreas em que os alunos se sentem menos competentes, professores e conselheiros podem desenvolver intervenções específicas para melhorar não apenas a autoestima dos alunos, mas também seu desempenho acadêmico..</p>
                        </div>
                    </div>
                    <div class="faq-item" id="faq5">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>Quais são os benefícios de utilizar a Escala Harter em terapia com adolescente?</button>
                        <div class="panel">
                            <p>A Escala Harter é particularmente benéfica na terapia com adolescentes, pois esta é uma fase da vida em que a autoestima pode ser volátil e altamente influenciada por fatores sociais e acadêmicos.</p>
                        </div>
                    </div>
                    <div class="faq-item" id="faq6">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>A Escala Harter pode ser aplicada em grupo?</button>
                        <div class="panel">
                            <p>Pode ser usada em grupos, com discussões ou atividades complementares.</p>
                        </div>  
                    </div> 
                    <div class="faq-item" id="faq7">
                        <button class="accordion"><i class="ri-arrow-right-wide-fill"></i>A Escala Harter pode ser reaplicada?</button>
                        <div class="panel">
                            <p>Sim, é útil para monitorar mudanças ao longo do tempo.</p>
                        </div>
                    </div> 
                </div>
                <div class="faq-image">
                    <img src="static/undraw_Faq_re_31cw.png" alt="Descrição da Imagem">
                </div>
            </section>
            

            <section class="Iniciar">
                <div class="interface">
                        <h1> Vamos iniciar? </h1>
                        <?php if ($is_invalid): ?>
                            <em>Login invalido</em>
                        <?php endif; ?>
                        <form method="post">
                            <label for="email">email:</label>
                            <input type="email" name="email" id="email"
                                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

                            <label for="senha">senha:</label>
                            <input type="password" name="senha" id="senha">

                            <button>Log in</button>
                        </form>
                    <div class='cadastrar'>
                        <button><a href='cadastrar.php'> cadastre-se </a></button>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="interface">
                <div class="line-footer">
                    <div class="flex">
                        <div class="social">
                            <p>Contato: +55 (11) 9999-9999</p>
                            <p>Email: contato@seudominio.com</p>
                            <a href="https://www.facebook.com/seunegocio">Facebook</a> |
                            <a href="https://www.twitter.com/seunegocio">Twitter</a> |
                            <a href="https://www.instagram.com/seunegocio">Instagram</a>
                        </div>
                    </div>
                    <div class="copy">
                        <p>&copy; 2024 CarolHarter. Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>

        
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const accordions = document.querySelectorAll('.accordion');
    
                accordions.forEach(accordion => {
                    accordion.addEventListener('click', () => {
                        const panel = accordion.nextElementSibling;
                        accordion.classList.toggle('active');
                        if (panel.style.maxHeight) {
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + 'px';
                        }
                    });
                });
            });
        </script>
    </body>


</html>
