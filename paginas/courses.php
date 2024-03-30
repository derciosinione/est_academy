<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="course.css" rel="stylesheet">

    <title>Courses</title>
</head>
<body>

<div class="modal" id="modalAddCourse">
    <div class="modal-background" onclick="toggleModalAddCourse()">
    </div>

    <div class="modal-content">
        <form>
            <h1>Adicionar Curso</h1>

            <div class="add-inputs">

                <label class="blackOpacity">
                    <input placeholder="Nome do Curso" type="text">
                </label>

                <label class="blackOpacity">
                    <input placeholder="Categoria" type="text">
                </label>

                <div>
                    <input class="mb10" type="button" value="ADICIONAR">
                    <input class="red-color" onclick="hideModalAddCourse()" type="button" value="CANCELAR">
                </div>
            </div>

        </form>
    </div>
</div>


<div class="board">
    <!-- SIDE BAR -->
    <?php include_once 'SideBarMenu.php' ?>

    <!-- MAIN ELEMENT  -->
    <main>
        <!-- MAIN HEADER -->
        <div class="main-header">
            <div class="main-header-left">
                <div class="main-menu-option">
                    <i class="fas fa-bars menu-icon"></i>
                </div>
            </div>

            <div class="main-header-right">
                <div class="search-container">
                    <input placeholder="Search..." type="text">
                    <button class="btn-icon" type="submit"><i class="fas fa-search"></i></button>
                </div>

                <!-- Circular avatar -->
                <?php include_once 'circularAvatar.php' ?>

            </div>
        </div>

        <!-- MAIN BODY -->
        <div class="main-body">

            <div class="main-description">
                <h2>Cursos</h2>

                <div>
                    <button onclick="toggleModalAddCourse()"><i class="fas fa-plus"></i> ADICIONAR</button>
                    <button class="more-option-btn" onclick="toggleMoreOption()">MAIS OPÇÕES</button>
                    <div class="more-option" id="more-option">
                        <p>Mais opções</p>
                        <hr>

                    </div>
                </div>
            </div>

            <div class="cards-container">

                <?php

                    require_once 'ShowErrorDetails.php';
                    require_once 'CourseService.php';

                    $courseService = new CourseService();

                 /** @var CourseModel[] $courses */
                $courses = $courseService->getAll();

                    foreach ($courses as $course) {
//                        echo "ID: " . $course->getId()
//                            . " - Name: " . $course->imageUrl
//                            . " - Docente: " . $course->getCreator()->name
//                            . " Category:". $course->getCategory()->name
//                            . "<br>";

                        $teacher = $course->getCreator()->name;
                        $category = $course->getCategory()->name;

                        $card = <<<HTML
                            <div class="course-card transition-scale">
                                <div class="course-avatar">
                                    <img alt="" class="img-cover" src="$course->imageUrl">
                                </div>
            
                                <div class="content-title">
                                    <p class="bold mb5">$course->name</p>
                                    <p class="blackOpacity smallText mb10"><i class="fas fa-user-tie"></i> $teacher </p>
                                    <span class="span-label blackBlue-color">$category</span>
                                </div>
                            </div>
HTML;

                        echo $card;

                    }
                ?>

            </div>

        </div>

    </main>
</div>

<script>
    let modalAddCourse = document.getElementById("modalAddCourse");

    function toggleModalAddCourse() {
        if (modalAddCourseIsVisible()) hideModalAddCourse();
        else showModalAddCourse();
    }

    function modalAddCourseIsVisible() {
        return modalAddCourse.style.display === "block";
    }

    function hideModalAddCourse() {
        modalAddCourse.style.display = "none";
    }

    function showModalAddCourse() {
        modalAddCourse.style.display = "block";
    }

</script>
</body>
</html>