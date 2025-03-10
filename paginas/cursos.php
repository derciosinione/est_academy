<?php
session_start();
include 'ShowErrorDetails.php';
require_once 'CourseService.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="course-web.css">

    <title>My Academy > Cursos</title>
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
                    <a class="nav-link" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre.html">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="cursos.html">Cursos</a>
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
        <div class="search-container">
            <h1>Cursos</h1>
            <h5>Vem aprender connosco</h5>
            <p>Pesquisa o curso desejado, ele está a um clique de ti</p>
            <?php $search = $_GET['search'] ?? ""; ?>
            <form action="cursos.php" method="get">
                <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Search" name="search"
                       value="<?php echo $search ?>">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</header>

<!-- Main Content -->
<main>
    <section class="our-courses mt-15">
        <h2>
            Confira os nossos cursos
        </h2>

        <div class="course-cards">


            <?php
            $courseService = new CourseService();

            $courses = $courseService->getAll($search, true);

            foreach ($courses as $course) {
                $teacher = $course->getCreator()->name;
                $category = $course->getCategory()->name;

                echo <<<HTML
                <div class="transition-scale">
                    <a href="cursos-detalhes.php?id=$course->id">
                        <div class="course-img">
                            <img src="$course->imageUrl" alt="">
                        </div>
                        <div class="course-body">
                            <h6>$course->name</h6>
                            <span class="bg-dark-blue">$category</span>
                        </div>
                    </a>
                </div>
HTML;
            }
            ?>

        </div>

        <div class="mt-15">
            <ul class="pagination m-lg-3">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <span class="page-link">2</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
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