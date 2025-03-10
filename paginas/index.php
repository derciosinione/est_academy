<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="course-web.css">
    <link rel="stylesheet" href="main-web.css">

    <title>My Academy</title>
</head>
<body>

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">MyAcademy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre.html">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cursos.php">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactos.html">Contactos</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero -->
    <div class="hero">
        <?php $search = $_GET['search'] ?? ""; ?>

        <div class="search-container">
            <h1>My Academy</h1>
            <h5>Vem aprender connosco</h5>
            <p>A melhor escola de cursos online de Portugal</p>
            <form action="cursos.php" method="get">
                <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Search" name="search" value="<?php echo $search; ?>">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</header>

<!-- Main Content -->
<main>

    <section class="about-card">
        <div class="about-img keep-show">
            <img src="about.jpg" alt="">
        </div>

        <div class="home-content-description">
            <h5 class="text-red">Sobre Nós</h5>
            <h2>Primeira escolha para educação on-line em qualquer lugar</h2>
            <p>
                Na My Academy, somos a sua primeira escolha para educação on-line, independentemente de onde
                você esteja. Com uma vasta gama de cursos em diversas áreas, oferecemos uma experiência de
                aprendizagem acessível, flexível e de alta qualidade. Nossos instrutores especializados,
                recursos interativos e suporte dedicado garantem que você tenha todas as ferramentas necessárias
                para alcançar seus objetivos educacionais e profissionais. Conecte-se com uma comunidade global
                de aprendizes e avance na sua carreira com certificados reconhecidos. Comece a aprender hoje com
                a My Academy e transforme seu futuro!
            </p>

            <div class="about-metric">
                <div class="bg-green">
                    <h2>4233</h2>
                    <p>Visitas Diarias</p>
                </div>

                <div class="bg-blue">
                    <h2>4233</h2>
                    <p>Cursos Online</p>
                </div>

                <div class="bg-red">
                    <h2>123</h2>
                    <p>Instrutores Especializados</p>
                </div>

                <div class="bg-yellow">
                    <h2>5532</h2>
                    <p>Alunos Cadastrados</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-card">
        <div class="home-content-description">
            <h5 class="text-red">Porquê MyAcademy?</h5>
            <h2>Porquê escolher estudar connosco?</h2>
            <h5>Transforme Seu Futuro com Educação de Qualidade</h5>
            <p>
                Na MyAcademy, acreditamos que a educação é a chave para desbloquear o seu potencial e
                transformar seu futuro. Nosso compromisso é fornecer cursos online de alta qualidade, acessíveis
                e relevantes para as necessidades do mercado atual. Aqui estão algumas razões pelas quais você
                deve escolher aprender conosco:
            </p>

            <ul class="ul-skills">
                <li>
                    <span class="bg-blue"><i class="fa fa-graduation-cap text-white"></i></span>
                    <div>
                        <h5>Cursos Desenvolvidos por Especialistas</h5>
                        <p>Nossos cursos são criados e ministrados por profissionais experientes e reconhecidos
                            em suas áreas. Isso garante que você receba uma educação atualizada e prática,
                            baseada nas últimas tendências e melhores práticas do mercado.</p>
                    </div>
                </li>
                <li>
                    <span class="bg-yellow"><i class="fa fa-certificate"></i></span>
                    <div>
                        <h5>Certificação Reconhecida</h5>
                        <p>Ao concluir nossos cursos, você receberá certificados que são reconhecidos e
                            valorizados no mercado de trabalho. Esses certificados podem ajudar a impulsionar
                            sua carreira e abrir novas oportunidades profissionais.</p>
                    </div>
                </li>
                <li>
                    <span class="bg-green"><i class="fa fa-book-reader text-white"></i></span>
                    <div>
                        <h5>Flexibilidade de Aprendizagem</h5>
                        <p>Entendemos que cada estudante tem uma rotina diferente. Por isso, nossos cursos são
                            projetados para serem acessíveis a qualquer hora e em qualquer lugar. Aprenda no seu
                            próprio ritmo, de acordo com sua agenda, sem comprometer a qualidade da
                            educação.</p>
                    </div>
                </li>
                <li>
                    <span class="bg-red"><i class="fa fa-certificate"></i></span>
                    <div>
                        <h5>Atualização Constante</h5>
                        <p>Estamos sempre atualizando e expandindo nosso catálogo de cursos para garantir que
                            você tenha acesso ao conteúdo mais relevante e inovador. Nunca pare de aprender e
                            evoluir com nossa vasta seleção de cursos.</p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="about-img">
            <img src="feature.jpg" alt="">
        </div>
    </section>

    <!-- Course Content -->
    <section class="our-courses">
        <h4>
            Confira os nossos cursos
        </h4>

        <div class="course-cards">

            <div class="transition-scale">
                <a href="#">
                    <div class="course-img">
                        <img src="coursebg.png" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Desenvolvimento Web</h6>
                        <span class="bg-yellow">Programação</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="#">
                    <div class="course-img">
                        <img src="coursebg.png" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Introdução a Html5 e Css</h6>
                        <span class="bg-yellow">Programação</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="#">
                    <div class="course-img">
                        <img src="coursebg.png" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Big Data</h6>
                        <span class="bg-blue">Ciência de Dados</span>
                    </div>
                </a>
            </div>

            <div class="transition-scale">
                <a href="#">
                    <div class="course-img">
                        <img src="coursebg.png" alt="">
                    </div>
                    <div class="course-body">
                        <h6>Logaritmo</h6>
                        <span class="bg-dark-blue">Matemática</span>
                    </div>
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Footer Content -->
<footer class="bg-dark text-white">
    <section>
        <div class="company-description">
            <h5 class="text-uppercase mb-4 font-weight-bold">My Academy</h5>
            <p>Bem-vindo à My Academy, sua plataforma de cursos online. Nosso objetivo é fornecer educação de qualidade
                acessível a todos. Explore uma variedade de cursos e aprenda no seu próprio ritmo, com o suporte de
                especialistas dedicados em diversas áreas. Junte-se a nós e comece sua jornada de aprendizado hoje
                mesmo!</p>
        </div>

        <div>
            <h5 class="text-uppercase">Contato</h5>
            <p><i class="fa fa-map-marker-alt mr-2"></i> Rua Doutor Jaimes Lopes Dias, 22 1E</p>
            <p><i class="fa fa-phone-alt mr-2"></i> +351 923 342 982</p>
            <p><i class="far fa-envelope"></i> info@myacademy.com</p>
        </div>

        <div>
            <h5 class="text-uppercase">Links Uteis</h5>
            <ul>
                <li><a href="sobre.html"><i class="fas fa-chevron-right"></i> Sobre</a></li>
                <li><a href="cursos.php"><i class="fas fa-chevron-right"></i> Cursos</a></li>
                <li><a href="contactos.html"><i class="fas fa-chevron-right"></i> Contacto</a></li>
                <li><a href="signup.php"><i class="fas fa-chevron-right"></i> Criar Conta</a></li>
            </ul>
        </div>
    </section>

    <hr class="mb-4">

    <div class="copy-right">
        <div>
            <p>© 2024 All rights reserved by:<a href="#"><strong class="text-white"> MyAcademy</strong></a></p>
        </div>

        <div>
            <ul>
                <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/in/derciosimione" target="_blank"><i
                                class="fab fa-linkedin-in"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UCquw3zsKMJH0IvS6zqyQJZw" target="_blank"><i
                                class="fab fa-youtube"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>