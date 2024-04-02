<?php
include_once 'Utils.php';
app_session_start();
include 'ShowErrorDetails.php';
require_once 'CourseService.php';

$courseService = new CourseService();

if (!isset($_GET["id"])) {
    header("Location: 404.php");
    $_SESSION['404_message'] = "Informe o identificado do curso";
    exit();
}

$courseId = $_GET["id"];

///** @var CourseModel $courses */
$course = $courseService->getById($courseId);

if (empty($course)) {
    $_SESSION['404_message'] = "Curso com identificador $courseId não encontrado.";
    header("Location: 404.php");
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.core.css">
    <link href="course.css" rel="stylesheet">
    <title>Course</title>
</head>
<body>


<div class="board">
    <!-- SIDE BAR -->
    <?php include 'SideBarMenu.php' ?>

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
                <!-- CIRCULAR AVATAR -->
                <?php include_once 'circularAvatar.php' ?>
            </div>
        </div>

        <!-- MAIN BODY -->
        <div class="main-body">

            <!-- MAIN DESCRIPTION -->
            <div class="main-description">
                <h3>Curso <i class="fab fa-discourse"></i> <span
                            class="blackOpacity"><?php echo "#" . $course->id . " - " . $course->name ?></span></h3>

                <!-- OPTIONS -->
                <div>
                    <button class="more-option-btn" onclick="toggleMoreOption()">MAIS OPÇÕES</button>
                    <div class="more-option" id="more-option">
                        <p>Mais opções</p>
                        <hr>
                        <a>Inscricoes</a>
                        <a>Desativar</a>
                    </div>
                </div>
            </div>

            <!-- DISPLAY SERVER MESSAGES -->
            <?php include 'displayMessageIfExists.php' ?>

            <!-- COURSE ITEM -->

            <div class="course-detail">

                <div class="course-detail-inputs">

                    <section>
                        <input placeholder="Nome do Curso" type="text" name="name"
                               value="<?php echo htmlspecialchars($course->name); ?>">

                        <select id="category" class="custom-select" name="category">
                            <option value="0" selected>Escolha a categoria</option>
                            <option value="8" <?php if ($course->categoryId == 8) echo 'selected' ?>>Banco de Dados
                            </option>
                            <option value="10" <?php if ($course->categoryId == 10) echo 'selected' ?>>Ciência de
                                Dados
                            </option>
                            <option value="11" <?php if ($course->categoryId == 11) echo 'selected' ?>>Cloud Computing
                            </option>
                            <option value="13" <?php if ($course->categoryId == 13) echo 'selected' ?>>Desenvolvimento
                                de Aplicativos Móveis
                            </option>
                            <option value="7" <?php if ($course->categoryId == 7) echo 'selected' ?>>Desenvolvimento
                                Web
                            </option>
                            <option value="1" <?php if ($course->categoryId == 1) echo 'selected' ?>>Diversos</option>
                            <option value="5" <?php if ($course->categoryId == 5) echo 'selected' ?>>Gestão</option>
                            <option value="2" <?php if ($course->categoryId == 2) echo 'selected' ?>>História</option>
                            <option value="6" <?php if ($course->categoryId == 6) echo 'selected' ?>>Matemática</option>
                            <option value="3" <?php if ($course->categoryId == 3) echo 'selected' ?>>Programação
                            </option>
                            <option value="4" <?php if ($course->categoryId == 4) echo 'selected' ?>>Robótica</option>
                            <option value="9" <?php if ($course->categoryId == 9) echo 'selected' ?>>Segurança da
                                Informação
                            </option>
                            <option value="12" <?php if ($course->categoryId == 12) echo 'selected' ?>>Sistemas
                                Operacionais
                            </option>
                        </select>

                        <input type="number" step="0.5" min="0" name="price" id="price" placeholder="(€) Preço"
                               value="<?php if ($course->price > 0) echo htmlspecialchars($course->price); ?>">

                        <input type="number" step="1" min="0" name="studentLimit" id="studentLimit" placeholder="Limite de alunos" value="<?php if ($course->maxStudent > 0) echo htmlspecialchars($course->maxStudent); ?>">
                    </section>

                </div>

                <section id="descriptionEditorBox">
                    <input type="hidden" id="descriptionContent" name="description"
                           value="<?php echo htmlspecialchars($course->description); ?>">
                    <div>
                        <div id="descriptionEditor"></div>
                    </div>
                </section>

                <div class="course-details-buttons mt20">
                    <input onclick="updateDescriptionContent()" onsubmit="updateDescriptionContent()" class="mb10" type="submit" value="EDITAR">
                    <input class="red-color" onclick="hideModalAddCourse()" type="button" value="ELIMINAR">
                </div>

            </div>

        </div>

    </main>
</div>

<script src="course.js"></script>

<?php require 'textEditorElement.php' ?>

</body>
</html>