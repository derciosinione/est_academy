<?php
include_once 'Utils.php';
include 'ShowErrorDetails.php';
require_once 'UserService.php';

if (!isset($_GET["id"])) {
    $_SESSION['404_message'] = "Informe o identificado do Aluno";
    header("Location: 404.php");
    exit();
}

$service = new UserService();

$studentId = $_GET["id"];

$student = $service->getUserById($studentId);

if (empty($student)) {
    $_SESSION['404_message'] = "Aluno com identificador $studentId não encontrado.";
    header("Location: 404.php");
    return;
}

$user = getLoggedUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="user.css" rel="stylesheet">
    <title>Students</title>
</head>
<body>

<div class="board">
    <!-- SIDE BAR -->
    <?php include_once 'SideBarMenu.php' ?>

    <!-- MAIN ELEMENT  -->
    <main id="main">

        <div class="student-detail-header">
            <div class="user-detail-bg-image">
                <img src="studentdetail-background.png">
            </div>

            <div class="circular-avatar">
                <img src="studentavatar.jpg">
            </div>
        </div>

        <section class="student-detail-section">
            <div>
                <h3><?php echo $student->name ?></h3>
                <p class="blackOpacity mt5"><i class="fas fa-book-reader"></i> <?php echo $student->profileName ?></p>
            </div>

            <!-- DISPLAY SERVER MESSAGES -->
            <?php include 'displayMessageIfExists.php' ?>

            <div class="student-detail-tab">
                <ul>
                    <li>
                        <a href="#">
                            <span>Perfil</span>
                        </a>
                        <div class="active-tab mt5"></div>
                    </li>
                    <li>
                        <a href="#">
                            <span>Inscrições</span>
                        </a>
                        <div class="active-tab mt5" hidden></div>
                    </li>
                </ul>
                <div class="line"></div>
            </div>

            <div class="student-detail-info">
                <div>
                    <div>
                        <label>NIF</label>
                        <span><?php echo $student->getNif() ?></span>
                    </div>

                    <div>
                        <label>Email</label>
                        <span><?php echo $student->email ?></span>
                    </div>
                </div>

                <div>
                    <div>
                        <label>Contacto</label>
                        <span><?php echo $student->phoneNumber ?></span>
                    </div>

                    <div>
                        <label>Data de Nascimento</label>
                        <span><?php echo $student->birthDay ?></span>
                    </div>
                </div>

                <div>
                    <div>
                        <label>Status</label>
                        <span><?php echo $student->getApprovedStatus() ?></span>
                    </div>

                    <div>
                        <label>Data de Cadastro</label>
                        <span><?php echo $student->createdAt ?></span>
                    </div>
                </div>
            </div>

            <?php
            $displayActionName = !$student->getIsApproved() ? "ADMITIR" : "REMOVER ACESSO";
            if (Constants::$adminId == $user->profileId) {
                ?>
                <form action="HandlerApproveStudent.php" method="get">
                    <input type="hidden" name="studentId" value="<?php echo htmlspecialchars($studentId); ?>">
                    <input type="hidden" name="status"
                           value="<?php echo htmlspecialchars($student->getIsApproved()); ?>">
                    <button class="mt30" type="submit"><?php echo htmlspecialchars($displayActionName); ?></button>
                </form>
                <?php
            }
            ?>
        </section>
    </main>
</div>

<script src="main.js"></script>
</body>
</html>