<?php
session_start();
if (!isset($_SESSION['email-login'])) {
    
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="https://kit.fontawesome.com/6dda5f6271.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    
    <title>Menu </title>

</head>

<body>
    <header>
        
        <a href="#home" class="logo">MD<span>evelop</span></a>
        <div class="container">
            
           
            <nav class="navegaçao">
                
                <ul class="nav-menu">
                   
                    <li class="nav-item"><a href="#sobre"> Sobre</a></li>
                    <li class="nav-item"><a href="#microdado">Microdados</a></li>
                    
                    <li class="nav-item"><a href="#servicos">Serviços</a></li>
                    
                        <li class="nav-item"><a href="#depoimentos"> Avaliações</a></li>
                            <li class="nav-item"><a href="#contato"> SAC</a></li>
                            <li class="nav-item"><div class="d-flex">
                            <a href="sair.php" class="btn btn-danger me-5"> Sair</a>
                            <a href="deletar.php?action=delete" class="btn btn-danger me-5" onclick="return confirm('Tem certeza que deseja deletar sua conta?')">Deletar conta</a>

           
        </div>
                        </a></li>
                            
                            
                    <i class='bx bx-search'></i>
                    
                </ul>
               
                <div class="menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>

                </div>
                
            </nav>
           
            

        </div>
        
        
    
    </header>

    
        <section id="home">
            <div class="circle">
                    
        </div>
      
            <div class="container2">
                <div class="text">
                    <h2> SOFTWARE PARA  ÁNALISE DE MICRODADOS </h2>
                    <p> Experimente gratuitamente nossos serviços e veja como suas pesquisas ficam mais fáceis com a gente!  </p>
                    <a href="pagEnem.html"> CONHEÇA MAIS SOBRE O ENEM </a>
                </div>
               
            </div>
            <div class="boxImg">
                <img src="img/MicrosoftTeams-image (2).png" alt="" class="imghome">
            </div>
         
                   
        </section>
        <div class="imagem-mia">
            <img src="img/mia.png" alt="Foto da Mia" onclick="abrirChatbot()">
        </div>
    
        <iframe id="chatbot" class="chatbot-popup" src="https://bot.airdroid.com/s/YV_hUULyNvnFLdo3_mCWLA"></iframe>
            <section id="sobre">
        <div class="container1">
            <section class="sobre">
            
           
          <div class="flex" >
            
            <div class="txt-sobre">
                <h2>MUITO PRAZER, <span>SOMOS A MDEVELOP.</span></h2>
                <p>
                    A mDevelop é um projeto dedicado à criação de interface simples e prática para análise de microdados educacionais, com foco especial no ENEM. Nossa missão é proporcionar ferramentas que facilitem a compreensão do desempenho dos participantes, análise de recursos com base em dados regionais entre outros, orientando políticas públicas, a entrega equitativa de recursos e iniciativas educacionais.
                    <br><br>
                    Desenvolvemos uma ferramenta simples que permite explorar Microdados dos participantes do ENEM, transformando pesquisas difíceis em consultas práticas. Com a mDevelop, instituições educacionais e pesquisadores podem aprimorar suas pesquisas envolvendo o sistema educacional brasileiro.
                    <br><br>
                    Nosso compromisso com a excelência, responsabilidade e transparência garante que cada dado fornecido seja relevante para os usuários. 
                    Experimente gratuitamente nossos serviços e facilite seus estudos. </p>
                
              
                <div class="btn-social">
                    <a href="https://www.instagram.com/develop_md?igsh=MTk2bDFoZGFtc3dtbA"><button><i class="bi bi-instagram"></i></button>
                  
                   
            
                    
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#5000ca" fill-opacity="0.3" d="M0,32L80,64C160,96,320,160,480,154.7C640,149,800,75,960,80C1120,85,1280,171,1360,213.3L1440,256L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
                      </svg>
                </div>
                </div>
            </div>
        </div>
        
    </section>
   
    <section id="microdado">
    <section class="microdado">
        <div class="container1">
        <div id="box2">
<ul class="estilizacao">
<li>

<img src= "img/previa.png" alt="">
<div class="conteudo4">
<a href="dashboard.html" class="btn-more">Acessar</a>
<p class="nome-secao"> </p>
</div>
</li>  
<li>

<img src="img/completo.png" alt="">
<div class="conteudo4">
<a href="retorno_sucesso.php" class="btn-more">Acessar</a>
<p class="nome-secao"></p>
</div>
</li>
</ul>
</div>
    </section>
    </section>

   
   


    <section id="servicos">
        <h2 class="titulo"> Confira nossos serviços:</h2>
        <div class="container3">
            <div class="container4">
                <div class="flip-container">
                    <div class="frente">
                        <h1 class="card">Microdados do Enem</h1>
                        <i class="bi bi-bar-chart-line-fill"></i>
                    </div>
                    <div class="trás">
                        <p>Exibimos em um dashboard que oferece um campo de interação simples para analisar os microdados do ENEM.</p>
                    </div>
                </div>
            </div>
            <div class="container4">
                <div class="flip-container">
                    <div class="frente">
                        <h1 class="card">Tutoriais</h1>
                        <i class="bi bi-brush"></i>
                    </div>
                    <div class="trás">
                        <p> Acesse nossas redes sociais e saiba como navegar corretamente através do painel de dados</p>
                    </div>
                </div>
            </div>
            <div class="container4">
                <div class="flip-container">
                    <div class="frente">
                        <h1 class="card">Suporte</h1>
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="trás">
                        <p>Disponibilizamos suporte técnico solícito, através do nosso contato direto via Email.</p>
                    </div>
                </div>
            </div>
            <div class="container4">
                <div class="flip-container">
                    <div class="frente">
                        <h1 class="card">Atualização do dados</h1>
                        <i class="bi bi-arrow-clockwise"></i>
                    </div>
                    <div class="trás">
                        <p>A Mdevelop realiza a manutenção e atualização anual dos dados e relatórios conforme disponibilizados pelo INEP. </p>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <section id="2009">
        <div class="container1">
            <section class="sobre">
            
           
          <div class="flex" >
            
            <div class="txt-sobre"> 
                <h2>O que aconteceu no ENEM de 2009?</span></h2>
                <p>
                o Enem de 2009 não foi utilizado pelas universidades para seleção devido ao seu cancelamento,causado pelo vazamento de questões.
                <br><br>
                Após o cancelamento uma nova prova foi aplicado posteriormente portando as notas do Enem de 2009 não foram consideradas para ingresso nas universidades naquele ano.
                <br><br>
                Dois dias antes da data marcada para a realização do exame, um grupo furtou as provas de dentro da gráfica que fazia a impressão e tentou vendê-las para veículos de comunicação. 

O MEC cancelou a prova e a remarcou para dois meses depois. Com isso, parte das universidades que usariam a nota do Enem em processos de seleção desistiram do método naquele ano,além da grande porcentagem de ausência dos alunos na realização da nova prova  
<br><br>
Os envolvidos no vazamento foram indiciados, e então presidente do Instittuto Nacional de Estudos e Pesquisas Educacionais (Inep), Reynaldo Fernandes deixou o cargo. 
            </p>
                
              
               
                    
                </div>
                </div>
            </div>
        </div>
        
    </section>
    </section>
    <section id="depoimentos">
   
    <section class="depoimento mySwiper">
    
        <div class="depoimento-container swiper-wrapper">
            <div class="slide swiper-slide">
              
                <p class="depoi-txt">
                    "O site é incrível! O dashboard do ENEM é super fácil de usar e muito informativo. Recomendo"
                </p>
                <div class="pessoa">
                    <img src="img/usuario.png" alt="">
                    <div class="info-pessoa">
                        <p class="nome"> Victoria Santos</p>
                        <p class="funçao"> Usuária</p>
                    </div>

                </div>

            </div>
            <div class="slide swiper-slide">
                
                <p class="depoi-txt">
                    "Excelente site!O dashboard de microdados do ENEM é muito prático.Recomendo!"
                </p>
                <div class="pessoa">
                    <img src="img/usuario.png" alt="">
                    <div class="info-pessoa">
                        <p class="nome"> Kauan Gabriel</p>
                        <p class="funçao"> Usuário</p>
                    </div>

                </div>

            </div>
            <div class="slide swiper-slide">
               
                <p class="depoi-txt">
                    "Muito fácil de utilizar,O dashboard do ENEM neste site é muito bem feito,Parabéns!"
                </p>
                <div class="pessoa">
                    <img src="img/usuario.png" alt="">
                    <div class="info-pessoa">
                        <p class="nome"> Pedro Henrique</p>
                        <p class="funçao"> Usuário</p>
                    </div>

                </div>

            </div>
        </div>
        <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>

    </section>
</section>


    <section id="contato">

        <div class="container1">
          <section class = "formulario">
            <div class="interface">
                <h2 class="titulo">Deixe sua mensagem:</h2>
                <form action="https://api.staticforms.xyz/submit" method="post">
                    <input type="text" name="name" id="name" placeholder="Seu nome completo:" required>
                    <input type="text" name="email" id="email" placeholder="Seu Email:" required>
                    <textarea name="message" id="message" placeholder="Sua mensagem:" required></textarea>
                    <div class="btn-enviar"><input type="submit" value="Enviar"> </div>
                    <input type="hidden" name="accessKey" value="86de2be8-dc73-4ff5-943d-371bf6f554e9">
                    <input type="hidden" name="redirectTo" value="http://localhost/TCC/obrigado.html">
                   
                </form> 

            </div>
            
          </section>
        </div>
        <div class="insta">
            
        </div>

    </section>
    

    <footer>
        <div class="container">
            <ul>

<p> Experimente também nosso aplicativo!</p>
<div class="btn-social">
    
        
       
</div>

            </ul>
            <ul>
                <h3>Links úteis</h3>
                <li> <a href="#home"> Home </a></li>
                <li> <a href="#"> Mobile</a></li>
            </ul>
            <ul>
                <h3> Saiba mais </h3>
                <li> <a href="pagEnem.html"> Enem </a></li> 
                <li> <a href="https://www.instagram.com/develop_md?igsh=MTk2bDFoZGFtc3dtbA"> Redes sociais </a></li>

            </ul>
            <ul>
                <h3> Suporte</h3>
                <li> <a href="#contato"> SAC </a></li>
                <li> <a href="#depoimentos"> Avaliações</a></li>
                
            </ul>
            <ul>
                <h3> Endereço</h3>
                
                <li> <a href="#"> Empresa virtual</a></li>
                <li> <a href="#"> Nos contate via SAC</a></li>
              
            </ul>



        </div>
        
           
    </footer>

    
    
    

    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/carrossel.js"></script>
    
    <script>
        function abrirChatbot() {
            var chatbot = document.getElementById("chatbot");
            if (chatbot.style.display === "none") {
                chatbot.style.display = "block";
            } else {
                chatbot.style.display = "none";
            }
        }

        window.addEventListener("click", function(event) {
            var chatbot = document.getElementById("chatbot");
            var miaImage = document.querySelector(".imagem-mia img");
            if (event.target !== chatbot && event.target !== miaImage) {
                chatbot.style.display = "none";
            }
        });
        </script>
       
    



       
      
</body>


</html>
