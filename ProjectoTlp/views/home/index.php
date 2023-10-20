<?php
session_start();

// Verificar se o usuário está logado
$user_logged_in = isset($_SESSION['user_id']);

// Variáveis de usuário
$user_email = '';

// Verificar se o usuário está logado
if ($user_logged_in) {
    // Recupera o email do usuário da variável de sessão
    $user_email = $_SESSION['user_email'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../public/assets/css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="header">
        <nav>
            <div class="logo">
                <img src="../../public/imagens/logo.jpeg" alt="">
                <h2>HCC <br> Center</h2>
            </div>
            <ul>
                <li>
                    <div>
                        <h1>+</h1>
                        <a href="" id="back">Home</a>
                    </div>
                </li>
                <li>
                    <div>
                        <h1>+</h1>
                        <a href="../consulta/index.html">Consulta</a>
                    </div>
                </li>
                <li>
                    <div>
                        <h1>+</h1>
                        <a href="#servi">Serviços</a>
                    </div>
                </li>
                <li>
                    <div>
                        <h1>+</h1>
                        <a href="#sobre" id="back">Sobre</a>
                    </div>
                </li>
                <li>
                    <div>
                        <h1>+</h1>
                        <a href="#footer" id="back">Contactos</a>
                    </div>
                </li>

                <li>
                    <div>
                        <h1>+</h1>
                        <a href="../cadastro/index.html">cadastro</a>
                    </div>
                </li>
                <?php
                if ($user_logged_in) {
                    // Exibe o email do usuário e o ícone de sair
                    echo '<li>';
                    echo '<div>';
                    echo '<h1>+</h1>';
                    echo '<a href="#">' . $user_email . '</a>';
                    echo '</div>';
                    echo '</li>';
                    echo '<li>';
                    echo '<div>';
                    echo '<h1>+</h1>';
                    echo '<a href="logout.php">Sair</a>';
                    echo '</div>';
                    echo '</li>';
                } else {
                    // Exibir o link de login
                    echo '<li>';
                    echo '<div class="">';
                    echo '<h1>+</h1>';
                    echo '<a href="../login/index.html" target="_blank">Login</a>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>

            </ul>
            
        </nav>
    </header>



    <!-- ----------------Configurando a img---------- -->
    <div class="body">
        <div class="container">
            <div class="help">
                <h2>Ajuda</h2>
                <h1>ONLINE</h1>
                <a href="../help/index.html" target="_blank"><input type="button" value="Saiba mais"></a>
            </div>
            <div class="sobre">
                
                <div class="s1">
                    <img src="../../public/imagens/im1.png" alt="" srcset="">
                    <header>frequência cardíaca</header>
                    <p>
                        A <strong>HCC</strong> cuida de quem ama. E nós amamo-vos.
                        Marque uma consulta e vá agora mesmo medir a sua frequência cardíaca.
                    </p>
                </div>
                <div class="s2">
                    <img src="../../public/imagens/im2.png" alt="" srcset="">
                    <header>teste de laboratório</header>
                    <p>
                       Chega de ir fazer testes sem fazer a marcação do mesmo.
                       Faça agora uma marcação rápida e vá já testar.
                    </p>
                </div>
                <div class="s3">
                    <img src="../../public/imagens/im3.png" alt="" srcset="">
                    <header>verificação de sintomas</header>
                    <p>
                        Agora poderás veriricar os teus sintomes, e viver livre de 
                        desconfianças.
                    </p>
                </div>
                <div class="s4">
                    <img src="../../public/imagens/im4.png" alt="" srcset="">
                    <header>ajuda <br> online</header>
                    <p>
                        Saiba mais sobre a <strong>HCC</strong>,
                        pedindo ajuda online, para entenderes como o nosso sistema funciona
                    </p>
                </div>
            </div>
        </div>

        <div class="cadastro">
            <form action="index.html" id="formulario">
                <h1>Faça seu cadastro</h1>
                <input type="text" name="nome" id="nome" placeholder="Nome" minlength="10" maxlength="20">
                <input type="email" name="email" id="email" placeholder="example@gmail.com">
                <input type="password" name="senha" id="senha" placeholder="Senha">
                <button type="submit">cadastrar</button>
            </form>
        </div>
    </div>
    
    <!-------------------Configurand a parte dos servicos---------------->
   
    <div class="serv">
          <!-- 
        <div class="galery">
            <div class="direita">
                <img src="../../public/imagens/artigo-viriato.jpg" alt="">
                <img src="../../public/imagens/download (2).jpeg" alt="">
                <img src="../../public/imagens/download (3).jpeg" alt="">
                <img src="../../public/imagens/download (4).jpeg" alt="">
                <img src="../../public/imagens/download (5).jpeg" alt="">
            </div>
        </div>
    -->
            <div class="info">
            <p>A HCC cuida sempre de si.</p>
            <p>Marque agora uma consulta e livrate de todas as doenças</p>
        </div>
    </div>
    <!-----------------Configurando a parte dos serviços--------------------------->
    <div class="servicos" id="servi">
        <header>Para um <strong>cuidado completo</strong> com a sua saúde</header>
        <div class="divs">
            <div class="d1">
                <img src="../../public/imagens/im01.png" alt="">
                <header ><a href="../consulta/index.html" id="c1" onclick="render()">Consulta presencial</a></header>
                <p class="as">Mais de 60 especialidades</p>
                <p class="pre">2.000,00KZ</p>
            </div>
            <div class="d2">
                <img src="../../public/imagens/im02.png" alt="">
                <header><a href="../consulta/index.html" id="c2">Exames</a></header>
                <p class="as">Mais de 500 tipos diferenciados</p>
                <p class="pre">10.000,00KZ</p>
            </div>
            <div class="d3">
                <img src="../../public/imagens/im03.png" alt="">
                <header><a href="../consulta/index.html" id="c3">Check-ups</a></header>
                <p class="as">Avaliação medica de rotina</p>
                <p class="pre">7.000,00KZ</p>
            </div>
            <div class="d4">
                <img src="../../public/imagens/im04.png" alt="">
                <header><a href="../consulta/index.html" id="c4">Vacinas</a></header>
                <p class="as">Para maiores e menores de idades</p>
                <p class="pre">3,000,00KZ</p>
            </div>
            <div class="d5">
                <img src="../../public/imagens/im05.png" alt="">
                <header><a href="../consulta/index.html" id="c5">Cirugias</a></header>
                <p  class="as">Pequenos procedimentos</p>
                <p class="pre">200.000,00KZ</p>
            </div>
            <div class="d6">
                <img src="../../public/imagens/im06.png" alt="">
                <header><a href="../consulta/index.html">Agendar</a></header>
                <p class="ag">Marque até para hoje mesmo</p>
                <hr>
                <p class="ag2">É simples e rapidinho</p>
            </div>
        </div>
    </div>
    <!-----------------Cnfigurando a parte dos serviços 2-->
        <!-----------------Configurando a parte dos serviços--------------------------->
        <div class="servicos2" id="servi">
            <header>Uma nova opção para você cuidar da sua saúde</header>
            <div class="divs">
                <div class="d1">
                    <img src="../../public/imagens/img1.png" alt="">
                    <header>Qualidade no seu atendimento</header>
                    <p>Profissionais, equipamentos e mais de 300 protocolos médicos para atender você com precisão, qualidade e padronização</p>
                </div>
                <div class="d2">
                    <img src="../../public/imagens/img2.png" alt="">
                    <header>Atendimento pra hoje</header>
                    <p>Agende rapidinho e marque suas consultas e exames pra quando quiser</p>
                </div>
                <div class="d3">
                    <img src="../../public/imagens/ing3.png" alt="">
                    <header>Retorno sem custo</header>
                    <p>Agende seu retorno em até 30 dias e fique com o bolso tranquilo</p>
                </div>
                <div class="d4">
                    <img src="../../public/imagens/img4.png" alt="">
                    <header>Fácil de pagar</header>
                    <p>Parcele suas consultas em até 3x e exames em até 10x. Sem juros!</p>
                </div>
            </div>
            <!----------------__Configurando a parte do sobre nos--------->
            <div class="sobre_empresa" id="sobre">
                <div class="sobreimg">
                    <img src="../../public/imagens/images (4).jpeg" alt="">
                </div>
                <div class="sobreinfo">
                    <header>Sobre Nós</header>
                    <p>
                        Projectada e construída de raiz pelos estudantes do ensino médio do curso de Tecnico informática do ITEL, a <strong>HCC</strong> um dos sistemas mais moderno de marcação de consultas e muitos outros serviços.
                    </p>
                    <p>
                        Sistema do ramo da saúde pertencente ao Grupo <strong>F5</strong> Iniciou as suas actividades de desenvolvimento do sistema a 1 de Maio de 2023, com grande foco na qualidade dos serviços prestados. A HCC possui vários serviços, e claro esses serviços surgiram para a melhoria e facilidade da vida de nossos irmãos.
                    </p>
                    <p>
                        Destacando-se como os únicos accionistas maioritários o grupo <strong>F5</strong> com 100%. Com um design assistencial desenvolvida e equipada para oferecer toda as funcionalidades necessárias à prestação de serviços nas diferentes especialidades médico-cirúrgicas hospitalares, disponibilizando uma gama de serviços de alta complexidade.
                    </p>
                    <p>
                        A <strong>HCC</strong> assume o compromisso de dar uma resposta abrangente e de elevada qualidade às mais variadas e complexas necessidades de saúde dos nossos clientes. Para manter o elevado padrão de atendimento, o sistemas possui funcionalidades(<strong>serviços</strong>) de praticamente todas as valências médicas e cirúrgicas.
                    </p>
                </div>
            </div>

            <!----------Configurando a parte dos funcionários---------->
            <div class="bodyf">
                <header>Conheça os nossos Profissionais</header>
                <div class="wrapper">
                    <img id="left" src="../../public/imagens/chevron-back-outline.svg" alt="" class="i">
                    <div class="carousel">
                        <img src="../../public/imagens/artigo-viriato.jpg" alt="" class="img">
                        <img src="../../public/imagens/blackdoctor.jpg" alt="" class="img">
                        <img src="../../public/imagens/male-dentist.jpg" alt="" class="img">
                        <img src="../../public/imagens/blackdoctor3.jpg" alt="" class="img">
                        <img src="../../public/imagens/blackdoctor2.jpg" alt="" class="img">
                        <img src="../../public/imagens/blackdoctor5.jpg" alt="" class="img">
                    </div>
                    <img id="right" src="../../public/imagens/chevron-forward-outline.svg" alt="" class="i">
                </div>
            </div>
            <!-- -------Configurando o footer----------- -->
            <footer id="footer">
                <div class="d1">
                    <img src="../../public/imagens/logo.jpeg" alt="" id="logo">
                    <header>HCC Center</header>

                    <p> <Strong>HCC</Strong>, mais do que amigos somos família</p>

                    <p><img src="../../public/imagens/email.png" alt="" id="co"><label for="">hcccenter@gmail.com</label></p>
                    <p><img src="../../public/imagens/fone.png" alt="" id="co"><label for="">+244949034892||+244924326360</label></p>
                    <p><img src="../../public/imagens/local.png" alt=""><label for="">Rua generalMonteiroLiborio|bairro cuca</label></p>

                    <div>
                        <a href="#"><img src="../../public/imagens/face.svg" alt=""></a>
                        <a href="#"><img src="../../public/imagens/yout.svg" alt=""></a>
                        <a href="#"><img src="../../public/imagens/insta.svg" alt=""></a>
                    </div>

                </div>
                <div class="d2">
                        <header>Fale Connosco</header>
                        <input type="email" placeholder="digite o seu email" id="email">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Deixe sua mensagem...">

                        </textarea>
                        <button type="submit" onclick="alert('Enviado!! Obrigado por falar connosco')">enviar</button>
                </div>
                <div class="d4">
                    <header>Serviços</header>
                    <ol>
                        <li><a href="">Consutas(todo tipo)</a></li>
                        <li><a href="">Medição de atenção</a></li>
                        <li><a href="">Análises Clínicas</a></li>
                        <li><a href="">Internamentos</a></li>
                        <li><a href="">Cirugias(todo tipo)</a></li>
                    </ol>
                </div>
            </footer>

        <!--  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>        
         <script src="../../public/assets/javascript/cadastro.js"></script>
         <script src="../../public/assets/javascript/funcionarios.js"></script>-->
         <script src="../../public/assets/javascript/home.js"></script>
         <script src="../../public/assets/javascript/funcionarios.js"></script>
</body>
</html>

<?php
                        if ($user_logged_in) {
                            header("Location: consulta.php?logged_in=true");
                            exit;
                        } else {
                            header("Location: consulta.php?logged_in=false");
                            exit;
                        }
                        ?>