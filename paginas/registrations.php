<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="main.css" rel="stylesheet">
    <link href="components.css" rel="stylesheet">
    <title>Registrations</title>

</head>
<body>

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
                <h2>Inscrições</h2>
                <div>
                    <button class="more-option-btn" onclick="toggleMoreOption()">MAIS OPÇÕES</button>
                    <div class="more-option" id="more-option">
                        <p>Mais opções</p>
                        <hr>
                        <div>
                            <input id="situation1" name="situation" type="checkbox"> <label
                                    for="situation1">Inativos</label>
                        </div>
                        <div>
                            <input id="situation2" name="situation" type="checkbox"> <label
                                    for="situation2">Aprovados</label>
                        </div>

                        <div>
                            <input id="situation3" name="situation" type="checkbox"> <label for="situation3">Aguardando
                                aprovação</label>
                        </div>

                        <div class="mt10 more-option-buttons">
                            <button class="red-color" onclick="">Cancelar</button>
                            <button class="" onclick="">Aplicar filtro</button>
                        </div>
                    </div>
                </div>
            </div>





            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Student details</th>
                        <th>Curso</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="td-line">
                            <div class="avatar">
                                <img src="studentavatar.jpg">
                            </div>
                            <div>
                                Dércio Sinione Derone
                                <p class="blackOpacity mt5 smallText">derciosinione@email.com</p>
                            </div>
                        </td>
                        <td>Informatica Movel</td>
                        <td>May 26, 2019</td>
                        <td><span data-status="pendente">Pendente</span></td>
                        <td>
                            <div class="table-actions">
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-check-double green-text"></i>
                                        <span class="tooltipText">Aceitar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-times red-text" style="font-size: 22px"></i>
                                        <span class="tooltipText">Recusar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fa fa-info-circle"></i>
                                        <span class="tooltipText">Informações da inscrição.</span>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="td-line">
                            <div class="avatar">
                                <img src="studentavatar.jpg">
                            </div>
                            <div>
                                Dércio Sinione Derone
                                <p class="blackOpacity mt5 smallText">derciosinione@email.com</p>
                            </div>
                        </td>
                        <td>Informatica Movel</td>
                        <td>May 26, 2019</td>
                        <td><span data-status="aprovado">Aprovado</span></td>
                        <td>
                            <div class="table-actions">
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-check-double green-text"></i>
                                        <span class="tooltipText">Aceitar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-times red-text" style="font-size: 22px"></i>
                                        <span class="tooltipText">Recusar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fa fa-info-circle"></i>
                                        <span class="tooltipText">Informações da inscrição.</span>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="td-line">
                            <div class="avatar">
                                <img src="studentavatar.jpg">
                            </div>
                            <div>
                                Dércio Sinione Derone
                                <p class="blackOpacity mt5 smallText">derciosinione@email.com</p>
                            </div>
                        </td>
                        <td>Informatica Movel</td>
                        <td>May 26, 2019</td>
                        <td><span data-status="reprovado">Reprovado</span></td>
                        <td>
                            <div class="table-actions">
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-check-double green-text"></i>
                                        <span class="tooltipText">Aceitar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-times red-text" style="font-size: 22px"></i>
                                        <span class="tooltipText">Recusar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fa fa-info-circle"></i>
                                        <span class="tooltipText">Informações da inscrição.</span>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="td-line">
                            <div class="avatar">
                                <img src="studentavatar.jpg">
                            </div>
                            <div>
                                Dércio Sinione Derone
                                <p class="blackOpacity mt5 smallText">derciosinione@email.com</p>
                            </div>
                        </td>
                        <td>Informatica Movel</td>
                        <td>May 26, 2019</td>
                        <td><span data-status="pendente">Pendente</span></td>
                        <td>
                            <div class="table-actions">
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-check-double green-text"></i>
                                        <span class="tooltipText">Aceitar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fas fa-times red-text" style="font-size: 22px"></i>
                                        <span class="tooltipText">Recusar inscrição do aluno</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="tooltip">
                                        <i class="fa fa-info-circle"></i>
                                        <span class="tooltipText">Informações da inscrição.</span>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>


        </div>

    </main>
</div>
</body>
</html>